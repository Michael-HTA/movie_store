<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="register-user"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Register User'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="card card-body mx-3 mx-md-4" style="margin-top: 25px">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="avatar avatar-xl position-relative">
                            <span class="material-icons" style="font-size: 80px; color: #888;">account_circle</span>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{-- {{ auth()->user()->name }} --}}
                            </h5>
                            <h3 class="mb-3">Test User</h3>
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Insert your Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method='POST' action='{{ route('user.store') }}' enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control border border-2 p-2">
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control border border-2 p-2">
                                    @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control border border-2 p-2">
                                    @error('password')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload user image</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                    @error('image')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Role</label>
                                    <select name="role_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                    </select>
                                    @error('type')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                            {{-- </form> --}}

                    </div>
                </div>
            </div>

        </div>
        {{-- <x-footers.auth></x-footers.auth> --}}
    </div>
    {{-- <x-plugins></x-plugins> --}}

</x-layout>
