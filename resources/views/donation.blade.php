<x-layout>
    <section class="bg-center bg-no-repeat bg-[url('https://appnastc.org/wp-content/uploads/2024/05/Untitled-design-22.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">APPNA STC | PAYMENT</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">You can make a payment with or without signing in as an APPNA SOUTH TEXAS CHAPTER member. If you opt to payment by logging in, your payment statement will be archived on your dashboard. Click Here To LOGIN</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('donation.index') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Donate Now
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Contact Us
                </a>  
            </div>
        </div>
    </section>
    <div class="max-w-screen-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto my-5">
        <h5 class="title-1">APPNA STC | PAYMENT</h5>
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
        <form  class="mx-auto pt-3" action="{{ route('donation.store') }}" method="POST">
        @csrf

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="text-input peer" placeholder=" " />
                <label for="first_name" class="text-input-label">First Name</label>
                @error('first_name') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" class="text-input peer" placeholder=" " />
                <label for="last_name" class="text-input-label">Last Name</label>
                @error('last_name') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="text-input peer" placeholder=" " />
                <label for="email" class="text-input-label">Email</label>
                @error('email') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="text-input peer" placeholder=" " />
                <label for="phone" class="text-input-label">Phone: xxx-xxx-xxxx</label>
                @error('phone') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">                
                <input type="number" name="amount" value="{{ old('amount') }}" id="amount" class="text-input peer" placeholder=" " />
                <label for="amount" class="text-input-label">Amount</label>
                @error('amount') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="member_id" value="{{ old('member_id') }}" id="member_id" class="text-input peer" placeholder=" " />
                <label for="member_id" class="text-input-label">Member ID (if have: APP1001)</label>
                @error('member_id') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div> --}}
        </div>

        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="purpose" value="{{ old('purpose') }}" id="purpose" class="text-input peer" placeholder=" " />
                <label for="purpose" class="text-input-label">Purpose</label>
                @error('purpose') <span class="text-sm text-red-800">{{ $message }}</span> @enderror
            </div>
        </div>        

        <button type="submit" class="blue-button">Submit</button>
    </form>
</div>
</x-layout>