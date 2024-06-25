<x-layout>
    <section class="bg-center bg-no-repeat bg-[url('https://appnastc.org/wp-content/uploads/2024/05/Untitled-design-27.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">BECOME A MEMBER</h1>
            
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('donation.index') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Donate Now
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="https://appnastc.org/inquiry/" target="_blank" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Contact Us
                </a>  
            </div>
        </div>
    </section>
    

<div class="max-w-screen-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto my-5">
    <h5 class="title-1">Member Registration Form</h5>
    @if ($message = Session::get('success'))
        <div class="success" role="alert">
            <span class="font-medium"> {{ $message }}</span>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="danger" role="alert">
            <span class="font-medium"> {{ $message }} </span>
        </div>
    @endif
    <form  class="mx-auto pt-3" action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="text-input peer" placeholder=" " />
                <label for="name" class="text-input-label">Name *</label>
                @error('name') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="email" value="{{ old('email') }}" id="email" class="text-input peer" placeholder=" " />
                <label for="email" class="text-input-label">Email *</label>
                @error('email') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select type="text" name="member_fee" value="{{ old('member_fee') }}" id="member_fee" class="text-input text-gray-500 peer" value="{{ old('member_fee') }} required placeholder=" ">
                    <option selected value="">Choose Member Fee *</option>
                    <option value="100">$100</option>
                </select>
                @error('member_fee') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="phone" value="{{ old('phone') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" class="text-input peer" placeholder=" " />
                <label for="phone" class="text-input-label">Phone*: xxx-xxx-xxxx</label>
                @error('phone') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="home_phone" value="{{ old('home_phone') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="home_phone" class="text-input peer" placeholder=" " />
                <label for="home_phone" class="text-input-label">Home Phone: xxx-xxx-xxxx </label>
                @error('home_phone') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="office_phone" value="{{ old('office_phone') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="office_phone" class="text-input peer" placeholder=" " />
                <label for="office_phone" class="text-input-label">Office Phone: xxx-xxx-xxxx</label>
                @error('office_phone') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="address" value="{{ old('address') }}" id="address" class="text-input peer" placeholder=" " />
                <label for="address" class="text-input-label">Address *</label>
                @error('address') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="other_address" value="{{ old('other_address') }}" id="other_address" class="text-input peer" placeholder=" " />
                <label for="other_address" class="text-input-label">Other Address</label>
                @error('other_address') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="city" value="{{ old('city') }}" id="city" class="text-input peer" placeholder=" " />
                <label for="city" class="text-input-label">City *</label>
                @error('city') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="state" value="{{ old('state') }}" id="state" class="text-input peer" placeholder=" " />
                <label for="state" class="text-input-label">State *</label>
                @error('state') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="zip_code" value="{{ old('zip_code') }}" id="zip_code" class="text-input peer" placeholder=" " />
                <label for="zip_code" class="text-input-label">Zip Code *</label>
                @error('zip_code') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <select type="text" name="country" value="{{ old('country') }}" id="country" class="text-input text-gray-500 peer" placeholder=" " >
                    <option class="text-gray-900" value="">Choose a Country</option>
                    <option class="text-gray-900" selected value="US">United States</option>
                </select>
                @error('country') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select type="text" name="medical" value="{{ old('medical') }}" id="medical" class="text-input text-gray-500 peer" placeholder=" " >
                    <option selected value="">Choose a Medical *</option>
                    <option value="Sindh Medical College">Sindh Medical College</option>
                    <option value="Aga Khan Medical College">Aga Khan Medical College</option>
                    <option value="Dow Medical College">Dow Medical College</option>
                    <option value="Baqai Medical College">Baqai Medical College</option>
                    <option value="Karachi Medical and Dental College">Karachi Medical and Dental College</option>
                    <option value="Ziauddin Medical College">Ziauddin Medical College</option>
                    <option value="Jamshoro Medical College">Jamshoro Medical College</option>
                    <option value="King Edward Medical College">King Edward Medical College</option>
                    <option value="Allama Iqbal Medical College">Allama Iqbal Medical College</option>
                    <option value="Fatima Jinnah Medical College">Fatima Jinnah Medical College</option>
                    <option value="Rawalpindi Medical College">Rawalpindi Medical College</option>
                    <option value="Nishtar Medical College">Nishtar Medical College</option>
                    <option value="Ayub Medical College">Ayub Medical College</option>
                    <option value="Bolan Medical College">Bolan Medical College</option>
                    <option value="Others">Others</option>
                </select>
                @error('medical') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>    
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="graduation_year" value="{{ old('graduation_year') }}" id="graduation_year" class="text-input peer" placeholder=" " />
                <label for="graduation_year" class="text-input-label">Graduation Year *</label>
                @error('graduation_year') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div> 

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="password" value="{{ old('password') }}" id="password" class="text-input peer" placeholder=" " />
                <label for="password" class="text-input-label">Password *</label>
                @error('password') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label class="upload-label" for="profile_photo">Profile Photo</label>
                <input class="upload-input" id="profile_photo" name="profile_photo" type="file">
                @error('profile_photo') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label class="upload-label" for="license_photo">License Photo</label>
                <input class="upload-input" id="license_photo" name="license_photo" type="file">
                @error('license_photo') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="blue-button">Submit</button>
        </form>
    </div>
</x-layout>
