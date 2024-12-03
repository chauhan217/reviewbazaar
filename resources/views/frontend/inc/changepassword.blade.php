<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
aria-labelledby="v-pills-profile-tab" tabindex="0">
<div class="p-4 border bg-light rounded-4">
    <form action="{{ route('profile.update.password') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">New Password <span
                            class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Confirm New Password <span
                            class="text-danger">*</span></label>
                    <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"> Update Password </button>
    </form>
</div>
</div>