<div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
    tabindex="0">
    <div class="p-4 border bg-light rounded-4">
        <form class="forms-sample mt-3" action="{{ route('profile.business.store') }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Business Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter company name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Website URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('website_url') is-invalid @enderror"
                            id="website_url" name="website_url" placeholder="www.example.com"
                            value="{{ old('website_url') }}">
                        @error('website_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Primary Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Primary Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter company email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select js-example-basic-single @error('category') is-invalid @enderror"
                            multiple id="category" name="categories[]" style="height:
                    100px">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">State <span class="text-danger">*</span></label>
                        <select class="form-select js-example-basic-single @error('state') is-invalid @enderror"
                             id="inputState" name="state" style="height:
                    100px">
                            <option value="" >Select</option>  
                            @foreach ($states as $category)
                                <option value="{{ $category }}"
                                    {{ $category==old('state') ? 'selected' : '' }}>
                                    {{ $category }}</option>
                            @endforeach
                        </select>
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">City <span
                                class="text-danger">*</span></label>
                                <select class="form-select js-example-basic-single @error('city') is-invalid @enderror"
                                 id="inputDistrict" name="city" style="height:
                        100px">
    
                                
                            </select>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Location">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Location" name="address"
                                value="{{ old('address') }}" placeholder="Location"onFocus="geolocate()" />
                            <small>(Please select your address from autocomplete suggestions)</small>
                        </div>
                        <input type="hidden" class="form-control" id="lati" name="longitude" value="{{ old('longitude') }}"
                            placeholder="Lat"  />
                        <input type="hidden" class="form-control" id="longi" name="latitude" value="{{ old('latitude') }}"
                            placeholder="Long"  />
                        
                        <input type="hidden" class="form-control" id="postal_code" name="zip" value="{{ old('zip') }}"
                            placeholder="Postal Code" readonly="readonly" />
                        <input type="hidden" class="form-control" id="country" name="country" value="{{ old('country') }}"
                            placeholder="Country" readonly="readonly" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Business Logo</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror"
                            name="logo" />
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Description *</label>
                        <textarea class="form-control @error('about') is-invalid @enderror" id="editor" name="about"
                            placeholder="Tell us about the company">{{ old('about') }}</textarea>
                        @error('about')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            

            <input type="hidden" name="status" value="inactive">
            <button type="submit" class="btn btn-primary">Add Business</button>
        </form>
    </div>
</div>
