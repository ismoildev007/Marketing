<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Company;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;

class PageController extends Controller
{
//    public function search(Request $request)
//    {
//        $query = $request->input('query');
//
//        // Barcha partnerlar va kategoriyalarni olish
//        $partners = Provider::all();
//        $categories = Category::all();
//
//        if ($query) {
//            // Kategoriyalarni qidiruv so'rovi bo'yicha filtrlash
//            $results = Category::where('name', 'LIKE', "%$query%")
//                ->orWhereHas('services', function ($q) use ($query) {
//                    $q->where('name_en', 'LIKE', "%$query%");
//                })
//                ->get();
//
//            // Providerlarni qidiruv so'rovi bo'yicha filtrlash
//            $providers = User::where('role_id', 2)->where('name', 'LIKE', "%$query%")
//                ->orWhere('description', 'LIKE', "%$query%")
//                ->orWhere('tagline', 'LIKE', "%$query%")
//                ->get();
//        } else {
//            // Qidiruv bo'yicha natijalar bo'lmasa bo'sh kolleksiya
//            $results = collect();
//            $providers = collect();
//        }
//
//        return view('pages.home-search', [
//            'results' => $results,
//            'query' => $query,
//            'partners' => $partners,
//            'categories' => $categories,
//            'providers' => $providers
//        ]);
//    }

    // home
    public function home()
    {
        $partners = User::where('role_id', 2)->get();
        $categories = ServiceCategory::all();
        return view('frontend.home', compact('partners', 'categories'));
    }

    // Page Provider
    public function pageProvider()
    {
        $providers = User::where('role_id', 2)->with('companies')->paginate(10);
        $sub_categories = ServiceSubCategory::all();
        $languages = Language::all();

        return view('frontend.page-provider', compact('providers', 'sub_categories', 'languages'));
    }

    public function serviceProvider($service_id, $category_id)
    {
        // Xizmat va kategoriya ma'lumotlarini olish
        $service = Service::find($service_id);
        $category = ServiceSubCategory::find($category_id);

        // Xizmat va kategoriya mavjud bo‘lmasa, foydalanuvchiga xabar ko‘rsatish
        if (!$service || !$category) {
            $providers = collect(); // Bo‘sh kolleksiya
            $message = 'Xizmat yoki kategoriya topilmadi.';
        } else {
            // Xizmatga tegishli barcha provayderlarni olish
            $providers = $service->provider()->paginate(6);

            // Agar provayderlar mavjud bo‘lmasa xabar
            if ($providers->isEmpty()) {
                $message = 'Provider topilmadi yoki Provider ma\'lumotlari mavjud emas.';
            } else {
                $message = null;
            }
        }

        // Barcha kategoriyalarni xizmatlari bilan olish
        $sub_categories = ServiceSubCategory::with('services')->get();
        $languages = Language::all();

        return view('frontend.page-service-provider', compact('providers', 'service', 'category', 'sub_categories', 'languages', 'message'));
    }





    public function rating()
    {
        $providers = User::where('role_id', 2)->with('companies')->paginate(10);
        $sub_categories = ServiceSubCategory::all();
        $languages = Language::all();


        return view('frontend.rating', compact('providers', 'sub_categories', 'languages'));
    }

    public function searchProviders()
    {
        return view('pages.search-provider');
    }

    public function singleProviders($id)
    {
        $provider = User::where('id', $id)->with('companies')->first();
        $reviews = Review::where('provider_id', $id)->with('serviceCategory')->get();
        $services = Service::where('provider_id', $id)->with('subCategory')->get();
        $average_review = Review::where('provider_id', $id)
            ->selectRaw('AVG(burget_score) as avg_burget_score, AVG(quality_score) as avg_quality_score, AVG(schedule_score) as avg_schedule_score, AVG(colloboration_score) as avg_colloboration_score')
            ->first();

        // Umumiy o'rtacha qiymatni hisoblash
        $average_score = ($average_review->avg_burget_score + $average_review->avg_quality_score + $average_review->avg_schedule_score + $average_review->avg_colloboration_score) / 4;

        $awards = Award::where('provider_id', $id)->get();
        $teams = Team::where('provider_id', $id)->first();
        $portfolios = Portfolio::where('provider_id', $id)->with('subCategory')->get();

        // Handle case where no reviews exist
        if ($average_review === null) {
            $average_review = 0; // Default value if no reviews exist
        }
        return view('frontend.single-provider', compact('provider', 'services', 'average_score', 'awards', 'teams', 'portfolios', 'reviews'));
    }

    public function singleReviews($id)
    {
        $provider = User::where('id', $id)->with('companies')->first();
        $services = Service::all();
        return view('frontend.single-reviews', compact('services', 'provider'));
    }

    // Marketers
    public function pageMarketers()
    {
        $marketers = User::where('role_id', 4)->paginate(6);

        return view('frontend.page-marketers', compact('marketers'));
    }

    public function singleMarketers($id)
    {
        $marketer = User::where('role_id', 4)->find($id);
        return view('frontend.single-marketers', compact('marketer'));
    }

    public function searchMarketers()
    {
        return view('pages.search-marketers');
    }

    public function pagePartners()
    {
        $providers = User::where('role_id', 2)->get();

        // Providerlar uchun o'rtacha reytingni hisoblash
        $providers->map(function ($provider) {
            $provider->average_rating = $provider->reviews->avg(function ($review) {
                // Har bir review uchun o'rtacha reytingni hisoblash
                return ($review->burget_score + $review->quality_score + $review->schedule_score + $review->colloboration_score) / 4;
            });

            return $provider;
        });

        return view('frontend.page-partners', compact('providers'));
    }

    public function singlePartners()
    {
        return view('frontend.single-partners');
    }

    public function searchPartners()
    {
        return view('pages.search-partners');
    }

    public function contact()
    {
        return view('frontend.contact');
    }


    public function filter(Request $request)
    {
        $companyAddress = $request->input('company_address');
        $languageId = $request->input('language_id'); // Til ID-si
        $description = $request->input('description'); // Qo'shimcha kalit so'zlar (description)
        $numberOfTeam = $request->input('number_of_team'); // Komanda hajmi

        // Foydalanuvchilarni olish
        $query = User::query()
            ->with('companies')
            ->where('role_id', 2); // Faqat role_id = 2 bo'lgan foydalanuvchilarni olish

        // Description bo'yicha filtr (Agar description berilgan bo'lsa)
        if ($description) {

            $query->WhereHas('companies', function ($query) use ($description) {
                $query->where('description', 'like', '%' . $description . '%');
            });
        }

        // Manzil bo'yicha filtr (Agar company address berilgan bo'lsa)
        if ($companyAddress) {
            $query->WhereHas('companies', function ($query) use ($companyAddress) {
                $query->where('address', 'like', '%' . $companyAddress . '%');
            });
        }

        // Til bo'yicha filtr (Agar til berilgan bo'lsa)
        if ($languageId) {
            $query->WhereHas('language', function ($query) use ($languageId) {
                $query->where('language_id', $languageId);
            });
        }

        // Komanda hajmi bo'yicha filtr (Agar number_of_team berilgan bo'lsa)
        if ($numberOfTeam) {
            $query->WhereHas('companies', function ($query) use ($numberOfTeam) {
                if ($numberOfTeam === "50+") {
                    // 50 va undan katta jamoalar uchun shart
                    $query->where('number_of_team', '>=', 50);
                } elseif (str_contains($numberOfTeam, '-')) {
                    // Masalan, "2-10" diapazoni uchun shart
                    [$min, $max] = explode('-', $numberOfTeam);
                    $query->whereBetween('number_of_team', [(int)$min, (int)$max]);
                } else {
                    // Foydalanuvchi aniq raqam kiritgan bo'lsa
                    $query->where('number_of_team', $numberOfTeam);
                }
            });
        }

        // Paginatsiya qilish
        $sub_categories = ServiceSubCategory::all();
        $languages = Language::all();

        $providers = $query->paginate(10);

        return view('frontend.page-provider', compact('providers', 'sub_categories', 'languages'));
    }






}
