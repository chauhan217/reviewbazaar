<div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
    tabindex="0">

    {{-- <div class="p-4 border bg-light rounded-4">
        <div class="py-4">
            <a class="btn btn-primary" href="{{ route('user.business.add') }}">+ Add</a>
        </div>
        @foreach ($companies as $company)
            <div class="list-wraps bg-white p-4 rounded-3 d-flex mb-3">
                <div class="list-style1 bg-light p-2 rounded-3 d-flex align-items-center justify-content-center">
                    @if ($company->logo && file_exists(public_path('logos/' . $company->logo)))
                        <img class="img-fluid rounded-3 bg-light" src="{{ asset('logos/' . $company->logo) }}"
                            alt="{{ $company->website_url }}">
                    @else
                        <img class="img-fluid rounded-3 bg-light" src="{{ asset('assets/images/company/1.png') }}"
                            alt="{{ $company->website_url }}">
                    @endif
                </div>
                <div class="list-style1 ps-5 d-flex align-items-center justify-content-between w-100">
                    <div class="box-styles">
                        <p><a class="text-decoration-none fs-5 text-dark"
                                href="{{ url('company/' . $company->website_url) }}">{{ $company->name }}</a></p>
                        <div class="d-flex align-items-center mb-2">
                            <div id="full-stars-example-two">
                                <div class="rating-group">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $company->averageRating())
                                            <i class="flaticon-star filled"></i>
                                        @else
                                            <i class="flaticon-star-empty"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <ul class="ms-4 mb-0 d-flex">
                                <li><a href="#"><i class="flaticon-visibility me-1"></i><span class="ps-2">
                                            {{ $company->reviewCount() }} reviews</span></a></li>
                                <li><a href="#"><i class="flaticon-telephone fs-6"></i> <span
                                            class="ps-2">{{ $company->phone }}</span></a></li>
                            </ul>
                        </div>
                        <p><i class="flaticon-pin"></i> {{ $company->city }}, {{ $company->country }}</p>
                        <p>{{ $company->location }}</p>
                        <div class="btn-group">

                            @foreach ($company->category_names as $category)
                                <a href="#"
                                    class="btn btn-light btn-sm rounded-pill me-2">{{ $category }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a class="btn btn-light" href="{{ url('company/' . $company->website_url) }}"><span
                            class="btn-title">View Profile</span></a>
                </div>
            </div>
        @endforeach
    </div> --}}
    <div class="p-4 border bg-light rounded-4">
        <div class="py-4">
            <a class="btn btn-primary" href="{{ route('user.business.add') }}">+ Add</a>
        </div>
    @foreach ($companies as $company)
        <div class="list-wraps bg-white p-4 rounded-3 d-flex mb-3">
            <div class="list-style1 bg-light p-2 rounded-3 d-flex align-items-center justify-content-center">
                @if ($company->logo && file_exists(public_path('logos/' . $company->logo)))
                    <img class="img-fluid rounded-3 bg-light" src="{{ asset('logos/' . $company->logo) }}"
                        alt="{{ $company->website_url }}">
                @else
                    <img class="img-fluid rounded-3 bg-light" src="{{ asset('assets/images/company/1.png') }}"
                        alt="{{ $company->website_url }}">
                @endif
            </div>
            <div class="list-style1 ps-5 d-flex align-items-center justify-content-between w-100">
                <div class="box-styles">
                    <p><a class="text-decoration-none fs-5 text-dark"
                            href="{{ url('company/' . $company->website_url) }}">{{ $company->name }}</a></p>
                    <div class="d-flex align-items-center mb-2">
                        <div id="full-stars-example-two">
                            <div class="rating-group">
                            </div>
                        </div>
                        <ul class="mb-0 d-flex align-items-center list-unstyled">
                            <li><a class="text-decoration-none text-dark" href="#"><i
                                        class="flaticon-visibility me-1"></i><span
                                        class="ps-1">{{ $company->reviewCount() }} reviews</span></a></li>
                            <li><a class="text-decoration-none ps-3 text-dark" href="#"><i
                                        class="flaticon-telephone fs-6"></i> <span>{{ $company->phone }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <p><i class="flaticon-pin"></i> {{ $company->city }}, {{ $company->country }}</p>
                    <p></p>
                    <div class="btn-group">
                        @foreach ($company->category_names as $category)
                            <a href="#" class="btn btn-light btn-sm rounded-pill me-2">{{ $category }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex">
                    <a class="btn btn-light" href="{{route('user.business.edit',$company->id)}}"><span class="btn-title"><img
                                src="assets/images/edit.png" width="20px" alt=""></span></a>
                    <a class="btn btn-light ms-3" href="{{ url('company/' . $company->website_url) }}"><span class="btn-title"><img
                                src="assets/images/show.png" width="20px" alt=""></span></a>
                </div>
            </div>
        </div>
     
@endforeach
    </div>
</div>
