@extends('provider.layouts.layout')

@section('content')

    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->

    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Analytics</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <span class="reportrange-picker-field"></span>
                        </div>
                        <div class="dropdown filter-dropdown">
                            <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                <i class="feather-filter me-2"></i>
                                <span>Filter</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Role" checked="checked">
                                        <label class="custom-control-label c-pointer" for="Role">Role</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Team" checked="checked">
                                        <label class="custom-control-label c-pointer" for="Team">Team</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Email" checked="checked">
                                        <label class="custom-control-label c-pointer" for="Email">Email</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Member" checked="checked">
                                        <label class="custom-control-label c-pointer" for="Member">Member</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked">
                                        <label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-plus me-3"></i>
                                    <span>Create New</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-filter me-3"></i>
                                    <span>Manage Filter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">
            <div class="row">
                <!-- [Mini Card] start -->
                <div class="col-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="hstack justify-content-between mb-4 pb-">
                                <div>
                                    <h5 class="mb-1">Email Reports</h5>
                                    <span class="fs-12 text-muted">Email Campaign Reports</span>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-light-brand">View Alls</a>
                            </div>
                            <div class="row">
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope fs-3 text-primary"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">50,545</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Total Email</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25,000</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Email Sent</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope-check fs-3 text-success"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20,354</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Delivered</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12,422</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Opened</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope-heart fs-3 text-teal"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">6,248</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Clicked</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-4 col-md-6">
                                    <div class="card stretch stretch-full border border-dashed border-gray-5">
                                        <div class="card-body rounded-3 text-center">
                                            <i class="bi bi-envelope-slash fs-3 text-danger"></i>
                                            <div class="fs-4 fw-bolder text-dark mt-3 mb-1">2,047</div>
                                            <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Bounce</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Mini Card] end -->
                <!-- [Visitors Overview] start -->
                <div class="col-xxl-8">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Visitors Overview</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Collapse/Expand">
                                        <a href="#" class="avatar-text avatar-xs bg-gray-300" data-bs-toggle="collapse"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="#" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="#" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="#" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action">
                            <div id="visitors-overview-statistics-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- [Visitors Overview] end -->

                <!-- [Goal Progress] start -->
                <div class="col-xxl-4">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Goal Progress</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action">
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                        <div class="mx-auto mb-4">
                                            <div class="goal-progress-1"></div>
                                        </div>
                                        <h2 class="fs-13 tx-spacing-1">Marketing Gaol</h2>
                                        <div class="fs-11 text-muted text-truncate-1-line">$550/$1250 USD</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                        <div class="mx-auto mb-4">
                                            <div class="goal-progress-2"></div>
                                        </div>
                                        <h2 class="fs-13 tx-spacing-1">Teams Goal</h2>
                                        <div class="fs-11 text-muted text-truncate-1-line">$550/$1250 USD</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                        <div class="mx-auto mb-4">
                                            <div class="goal-progress-3"></div>
                                        </div>
                                        <h2 class="fs-13 tx-spacing-1">Leads Goal</h2>
                                        <div class="fs-11 text-muted text-truncate-1-line">$850/$950 USD</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="px-4 py-3 text-center border border-dashed rounded-3">
                                        <div class="mx-auto mb-4">
                                            <div class="goal-progress-4"></div>
                                        </div>
                                        <h2 class="fs-13 tx-spacing-1">Revenue Goal</h2>
                                        <div class="fs-11 text-muted text-truncate-1-line">$5,655/$12,500 USD</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0);" class="btn btn-primary">Generate Report</a>
                        </div>
                    </div>
                </div>
                <!-- [Goal Progress] end -->

                <!-- [Mini Card] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between p-4 mb-4">
                                <div>
                                    <div class="fw-bold mb-2 text-dark text-truncate-1-line">Bounce Rate (Avg)</div>
                                    <div class="fs-11 text-muted">VS 20.49% (Prev)</div>
                                </div>
                                <div class="text-end">
                                    <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">78.65</span>%</div>
                                    <div class="fs-11 text-success">(+ 22.85%)</div>
                                </div>
                            </div>
                            <div id="bounce-rate"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between p-4 mb-4">
                                <div>
                                    <div class="fw-bold mb-2 text-dark text-truncate-1-line">Page Views (Avg)</div>
                                    <div class="fs-11 text-muted">VS 36.47% (Prev)</div>
                                </div>
                                <div class="text-end">
                                    <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">86.37</span>%</div>
                                    <div class="fs-11 text-danger">(- 34.25%)</div>
                                </div>
                            </div>
                            <div id="page-views"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between p-4 mb-4">
                                <div>
                                    <div class="fw-bold mb-2 text-dark text-truncate-1-line">Site Impressions (Avg)</div>
                                    <div class="fs-11 text-muted">VS 43.67% (Prev)</div>
                                </div>
                                <div class="tx-right">
                                    <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">67.53</span>%</div>
                                    <div class="fs-11 text-success">(+ 42.72%)</div>
                                </div>
                            </div>
                            <div id="site-impressions"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between p-4 mb-4">
                                <div>
                                    <div class="fw-bold mb-2 text-dark text-truncate-1-line">Conversions Rate (Avg)</div>
                                    <div class="fs-11 text-muted">VS 22.34% (Prev)</div>
                                </div>
                                <div class="tx-right">
                                    <div class="fs-24 fw-bold mb-2 text-dark"><span class="counter">32.53</span>%</div>
                                    <div class="fs-11 text-success">(+ 35.47%)</div>
                                </div>
                            </div>
                            <div id="conversions-rate"></div>
                        </div>
                    </div>
                </div>
                <!-- [Mini Card] end -->

            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>

    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

@endsection
