<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="post" action="/register" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="name">
                        Name
                    </label>

                    <input class="border border-grey-400 p-2 w-full" type="text" name="name" value="{{ old('name') }}"
                        id="name" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="username">
                        Username
                    </label>

                    <input class="border border-grey-400 p-2 w-full" type="text" name="username"
                        value="{{ old('username') }}" id="username" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="email">
                        Email
                    </label>

                    <input class="border border-grey-400 p-2 w-full" type="email" name="email"
                        value="{{ old('email') }}" id="email" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700" for="password">
                        Password
                    </label>

                    <input class="border border-grey-400 p-2 w-full" type="password" name="password" id="password"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
