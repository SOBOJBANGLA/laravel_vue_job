@extends('frontend.layouts.app')

@section('title','Jobs')

@section('content')
<section class="bg-half-170 d-table w-100" style="background: url({{asset('images/hero/bg.jpg') }});">
    <div class="bg-overlay bg-gradient-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Job Vacancies</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="position-middle-bottom">
            <nav aria-label="breadcrumb" class="d-block">
                <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.html">Jobnova</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                </ul>
            </nav>
        </div>
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-lg-4 col-md-6 col-12">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                <div class="card bg-white p-4 rounded shadow sticky-bar">
                    <!-- SEARCH -->
                    <div>
                        <h6 class="mb-0">Search Keywords</h6>

                        <div class="search-bar mt-2">
                            <div id="itemSearch2" class="menu-search mb-0">
                
                                
                                    <input type="text" class="form-control rounded border" name="search" id="searchItem2" placeholder="Search...">
                                    
                                    {{-- <button type="submit" id="searchItemsubmit2">Search</button> --}}
                                </form>
                                    {{-- <input type="submit" id="searchItemsubmit2" value="Search"> --}}
                                
                            </div>
                        </div>
                    </div>
                    <!-- SEARCH -->
                    {{-- <form action="" name="searchForm" id="searchForm"> --}}
                    <!-- Categories -->
                    <div class="mt-4">
                        <h6 class="mb-0">Categories</h6>
                        <select class="form-select form-control border mt-2" aria-label="Default select example" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)	
                            <option value="{{$category->id}}" @selected(old('category')==$category->id) >{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="query" placeholder="Search..."> --}}
                    </div>
                    <!-- Categories -->

                    <!-- Location -->
                    <div class="mt-4">
                        <h6 class="mb-0">Location</h6>

                        <select class="form-select form-control border mt-2" aria-label="Default select example" name="location" id="location">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)	
							<option value="{{$location->id}}" @selected(old('location')==$location->id) >{{$location->location_name}}</option>
							@endforeach
                        </select>
                    </div>
                    <!-- Location -->

                    <!-- Type Start -->
                    <div class="mt-4">
                        <h6>Job Types</h6>
                        <select class="form-select form-control border mt-2" aria-label="Default select example" name="jobtype" id="jobtype">
                            <option value="">Select Jobtype</option>
                            @foreach($jobtypes as $jobtype)	
							<option value="{{$jobtype->id}}" @selected(old('jobtype')==$jobtype->id) >{{$jobtype->jobtype_name}}</option>
							@endforeach
                        </select>
                        
                    </div>
                    <!-- Type End -->

                    <!-- Salary -->
                   
                    <!-- Salary -->

                    <div class="mt-4">
                        {{-- <button type="submit" id="searchItemsubmit2">Search</button> --}}
                        <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
                    </div>

                </form>
                
                </div>
            </div><!--end col-->



            <div class="col-lg-8 col-md-6 col-12">
                <div class="row g-4">
                    {{-- @if ($jobs->isNotEmpty()) --}}
                    @foreach ($jobs as $item)
                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-250px">
                                <img src="{{ asset('images/company/job.jpg') }}" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">{{$item->title}}</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">{{$item->jobtype->jobtype_name}}</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>{{$item->category->category_name}}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>{{$item->location->location_name}}</span>
                                <span class="d-flex fw-medium mt-md-2">{{$item->salary}}</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="{{ route('jobDetail',$item->id) }}" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    @endforeach
                    {{-- <div class="col-md-12">
                        {{ $jobs->withQueryString()->links() }}
                    </div>
                @else
                <div class="col-md-12">Jobs not found</div>                                
                @endif   --}}
            
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 mt-4 pt-2">
                        {{-- {{ $jobs->withQueryString()->links() }} --}}
                        {{ $jobs->links() }}
     {{-- {{ $jobs->withQueryString()->links() }} --}}
                       
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center mb-4 pb-2">
            <div class="col-12">
                <div class="section-title text-center">
                    <h4 class="title mb-3">Here's why you'll love it Jobnova</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="position-relative features text-center p-4 rounded shadow bg-white">
                    <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                        <i data-feather="phone" class="fea icon-ex-md"></i>
                    </div>

                    <div class="mt-4">
                        <a href="" class="title h5 text-dark">24/7 Support</a>
                        <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="position-relative features text-center p-4 rounded shadow bg-white">
                    <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                        <i data-feather="cpu" class="fea icon-ex-md"></i>
                    </div>

                    <div class="mt-4">
                        <a href="" class="title h5 text-dark">Tech & Startup Jobs</a>
                        <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="position-relative features text-center p-4 rounded shadow bg-white">
                    <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                        <i data-feather="activity" class="fea icon-ex-md"></i>
                    </div>

                    <div class="mt-4">
                        <a href="" class="title h5 text-dark">Quick & Easy</a>
                        <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="position-relative features text-center p-4 rounded shadow bg-white">
                    <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                        <i data-feather="clock" class="fea icon-ex-md"></i>
                    </div>

                    <div class="mt-4">
                        <a href="" class="title h5 text-dark">Save Time</a>
                        <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection



