<?php

namespace App\Http\Controllers\provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioClient;
use App\Models\ProviderCompany;
use App\Models\Sector;
use App\Models\Gallery;
use App\Models\ServiceSubCategory;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    public function index()
    {
        // Get the provider's company
        $providerCompany = ProviderCompany::where('provider_id', Auth::user()->id)->first();

        if ($providerCompany) {
            // Get all providers for this company
            $providerIds = ProviderCompany::where('company_id', $providerCompany->company_id)
                ->pluck('provider_id');

            // Get the latest team info for all providers in the company
            $portfolios = Portfolio::whereIn('provider_id', $providerIds)->orderBy('id', 'DESC')
                ->paginate(20);;
        } else {
            // If the provider is not associated with any company, return an empty collection
            $portfolios = collect();
        }
        $services = ServiceSubCategory::all();


        $sectors = Sector::all();

        return view('provider.portfolios.index', compact('portfolios', 'services', 'sectors'));
    }

    public function create()
    {
        $providers = User::where('role_id', 2)->get();
        $services = ServiceSubCategory::all();
        $skills = Skill::all();
        $sectors = Sector::all();

        return view('provider.portfolios.create', compact('providers', 'services', 'skills', 'sectors'));
    }

    public function store(PortfolioRequest $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validated();

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('portfolio_images', 'public');
            }

            // Create the portfolio
            $portfolio = Portfolio::create([
                'provider_id' => $validatedData['provider_id'],
                'service_sub_category_id' => $validatedData['service_sub_category_id'],
                'work_title' => $validatedData['work_title'],
                'image' => $imagePath,  // Fayl path saqlash
                'budget' => $validatedData['budget'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
                'introduction' => $validatedData['introduction'],
                'challenges' => $validatedData['challenges'],
                'solution' => $validatedData['solution'],
                'impact' => $validatedData['impact'],
                'source_link' => $validatedData['source_link'],
            ]);

            // Attach skills to portfolio if any
            if ($request->has('skills')) {
                $portfolio->skills()->sync($validatedData['skills']);
            }

            // Store client information
            PortfolioClient::create([
                'portfolio_id' => $portfolio->id,
                'company_name' => $validatedData['company_name'],
                'location' => $validatedData['company_location'],
                'geographic_scope' => $validatedData['geographic_scope'],
                'audience' => $validatedData['audience'],
            ]);

            return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Xatolik yuz berdi: ' . $e->getMessage()]);
        }
    }

    public function edit(Portfolio $portfolio)
    {
        $providers = User::where('role_id', 2)->get();
        $services = ServiceSubCategory::all();
        $skills = Skill::all();
        $sectors = Sector::all();
        $client = PortfolioClient::where('provider_id', $portfolio->provider_id)->first();
        return view('provider.portfolios.edit', compact('portfolio', 'providers', 'services', 'skills', 'sectors', 'client'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {

        try {
            $data = $request->validate([
                'provider_id' => 'required|exists:users,id',
                'service_sub_category_id' => 'required|exists:service_sub_categories,id',
                'work_title' => 'required|string|max:255',
                'budget' => 'required|numeric',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'introduction' => 'nullable|string',
                'challenges' => 'nullable|string',
                'solution' => 'nullable|string',
                'impact' => 'nullable|string',
                'source_link' => 'nullable|string',
                'company_name' => 'required|string|max:255',
                'company_location' => 'required|string|max:255',
                'geographic_scope' => 'nullable|string',
                'audience' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            if ($request->hasFile('image')) {
                if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                    Storage::disk('public')->delete($portfolio->image);
                }

                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('portfolio_images', $filename, 'public');

                $data['image'] = $path;
            } else {
                $data['image'] = $portfolio->image;
            }

            $portfolio->update($data);

            $client = PortfolioClient::updateOrCreate(
                ['portfolio_id' => $portfolio->id],
                [
                    'company_name'     => $data['company_name'],
                    'location'        => $data['company_location'],
                    'geographic_scope' => $data['geographic_scope'],
                    'audience'        => $data['audience'],
                ]
            );

            return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Xatolik: ' . $e->getMessage()]);
        }
    }

    public function destroy(Portfolio $portfolio)
    {

        $portfolio->skills()->detach();

        $portfolio->delete();

        return redirect()->route('portfolios.index')->with('success', 'Portfolio successfully deleted.');
    }


    public function show(Portfolio $portfolio)
    {
        return view('provider.portfolios.show', compact('portfolio'));
    }

    // In your controller (e.g., PortfolioController)
    public function getSkillsByService($serviceId)
    {
        // Assuming you have a Service model and each service has a 'skills' relationship
        $service = ServiceSubCategory::find($serviceId);

        if ($service) {
            return response()->json($service->skills); // Return skills as JSON
        }

        return response()->json([]);
    }

}
