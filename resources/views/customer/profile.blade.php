@extends('customer.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card modern-profile-card">
                <div class="card-header profile-card-header">
                    <h4><i class="fas fa-user-edit me-2"></i>Update Your Profile</h4>
                    <p>Keep your information up to date</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.profile.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-photo-section">
                                    @php
                                    if(Auth::guard('customer')->user()->photo != '') {
                                        $customer_photo = Auth::guard('customer')->user()->photo;
                                    } else {
                                        $customer_photo = 'default.png';
                                    }
                                    @endphp
                                    <div class="photo-preview">
                                        <img src="{{ asset('uploads/'.$customer_photo) }}" alt="" class="profile-photo">
                                        <div class="photo-overlay">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="photo-upload">
                                        <label for="photo" class="upload-label">
                                            <i class="fas fa-upload me-2"></i>Choose Photo
                                        </label>
                                        <input type="file" class="form-control" name="photo" id="photo" style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-user me-2"></i>Name *</label>
                                            <input type="text" class="form-control modern-input" name="name" value="{{ Auth::guard('customer')->user()->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-envelope me-2"></i>Email *</label>
                                            <input type="email" class="form-control modern-input" name="email" value="{{ Auth::guard('customer')->user()->email }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-phone me-2"></i>Phone</label>
                                            <input type="text" class="form-control modern-input" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-globe me-2"></i>Country</label>
                                            <input type="text" class="form-control modern-input" name="country" value="{{ Auth::guard('customer')->user()->country }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                                            <input type="text" class="form-control modern-input" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-map me-2"></i>State</label>
                                            <input type="text" class="form-control modern-input" name="state" value="{{ Auth::guard('customer')->user()->state }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-city me-2"></i>City</label>
                                            <input type="text" class="form-control modern-input" name="city" value="{{ Auth::guard('customer')->user()->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 form-group-modern">
                                            <label class="form-label"><i class="fas fa-mail-bulk me-2"></i>Zip</label>
                                            <input type="text" class="form-control modern-input" name="zip" value="{{ Auth::guard('customer')->user()->zip }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="password-section">
                                    <h5 class="section-subtitle"><i class="fas fa-lock me-2"></i>Change Password (Optional)</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4 form-group-modern">
                                                <label class="form-label"><i class="fas fa-key me-2"></i>New Password</label>
                                                <input type="password" class="form-control modern-input" name="password" placeholder="Leave blank to keep current password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4 form-group-modern">
                                                <label class="form-label"><i class="fas fa-key me-2"></i>Confirm Password</label>
                                                <input type="password" class="form-control modern-input" name="retype_password" placeholder="Confirm new password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4 mt-4">
                                    <button type="submit" class="btn-update-profile">
                                        <i class="fas fa-save me-2"></i>Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Profile Card */
.modern-profile-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.profile-card-header {
    background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
    padding: 25px 30px;
    border-bottom: none;
}

.profile-card-header h4 {
    color: white;
    font-weight: 700;
    font-size: 1.5rem;
    margin: 0 0 5px 0;
}

.profile-card-header p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 14px;
}

/* Profile Photo Section */
.profile-photo-section {
    text-align: center;
}

.photo-preview {
    position: relative;
    width: 180px;
    height: 180px;
    margin: 0 auto 20px;
    border-radius: 15px;
    overflow: hidden;
    border: 4px solid #b8a055;
    box-shadow: 0 10px 30px rgba(184, 160, 85, 0.3);
}

.profile-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(26, 54, 93, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.photo-preview:hover .photo-overlay {
    opacity: 1;
}

.photo-overlay i {
    font-size: 40px;
    color: white;
}

.photo-upload {
    margin-top: 15px;
}

.upload-label {
    display: inline-block;
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(184, 160, 85, 0.3);
}

.upload-label:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(184, 160, 85, 0.4);
}

/* Form Groups */
.form-group-modern {
    position: relative;
}

.form-group-modern .form-label {
    font-weight: 600;
    color: #1a365d;
    margin-bottom: 8px;
    display: block;
}

.form-group-modern .form-label i {
    color: #b8a055;
}

.modern-input {
    padding: 12px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.modern-input:focus {
    border-color: #b8a055;
    box-shadow: 0 0 0 0.2rem rgba(184, 160, 85, 0.15);
    outline: none;
}

/* Password Section */
.password-section {
    margin-top: 30px;
    padding-top: 30px;
    border-top: 2px solid #f0f0f0;
}

.section-subtitle {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a365d;
    margin-bottom: 20px;
}

.section-subtitle i {
    color: #b8a055;
}

/* Update Button */
.btn-update-profile {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 14px 40px;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(184, 160, 85, 0.3);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
}

.btn-update-profile:hover {
    background: linear-gradient(135deg, #a08f4a, #8f7d3f);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(184, 160, 85, 0.4);
}

.btn-update-profile i {
    font-size: 18px;
}

/* Responsive */
@media (max-width: 768px) {
    .profile-photo-section {
        margin-bottom: 30px;
    }
    
    .photo-preview {
        width: 150px;
        height: 150px;
    }
    
    .profile-card-header {
        padding: 20px;
    }
    
    .profile-card-header h4 {
        font-size: 1.3rem;
    }
}
</style>

<script>
// Preview image before upload
document.getElementById('photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.profile-photo').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection