<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="p-4 border bg-light rounded-4">
                                      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Full Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                             value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" name="email"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                             value="{{ old('email', $user->email) }}">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone No <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone', $user->phone) }}" >
                                                    @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Business</label>
                                                        <input type="text" name="business"
                                                            class="form-control @error('business') is-invalid @enderror"
                                                            value="{{ old('business', $user->business) }}" >
                                                        @error('business')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Profile Pic</label>
                                                        <input class="form-control @error('profile') is-invalid @enderror"
                                                            type="file" name="profile" id="formFile">
                                                        @error('profile')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">About Me</label>
                                                        <div class="form-floating">
                                                            <textarea class="form-control @error('about') is-invalid @enderror"  name="about"
                                                                 id="floatingTextarea">{{ old('about', $user->about) }}</textarea>
                                                            
                                                            @error('about')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Facebook</label>
                                                        <input type="text"
                                                            class="form-control @error('facebook') is-invalid @enderror"
                                                             name="facebook"
                                                            value="{{ old('facebook', $user->facebook) }}">
                                                        @error('facebook')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Twitter</label>
                                                        <input type="text"
                                                            class="form-control @error('twitter') is-invalid @enderror"
                                                             name="twitter"
                                                            value="{{ old('twitter', $user->twitter) }}">
                                                        @error('twitter')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Linkedin</label>
                                                        <input type="text"
                                                            class="form-control @error('linkedin') is-invalid @enderror"
                                                             name="linkedin"
                                                            value="{{ old('linkedin', $user->linkedin) }}">
                                                        @error('linkedin')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Youtube</label>
                                                        <input type="text"
                                                            class="form-control @error('youtube') is-invalid @enderror"
                                                             name="youtube"
                                                            value="{{ old('youtube', $user->youtube) }}">
                                                        @error('youtube')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Instagram</label>
                                                        <input type="text"
                                                            class="form-control @error('instagram') is-invalid @enderror"
                                                             name="instagram"
                                                            value="{{ old('instagram', $user->instagram) }}">
                                                        @error('instagram')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Pinterest</label>
                                                        <input type="text"
                                                            class="form-control @error('pinterest') is-invalid @enderror"
                                                             name="pinterest"
                                                            value="{{ old('pinterest', $user->pinterest) }}">
                                                        @error('pinterest')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update My Profile </button>
                                        </form>
                                    </div>
                                </div>