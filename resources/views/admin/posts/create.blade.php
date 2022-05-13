<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            {{-- {{ print_r($errors) }} --}}

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required :value="old('thumbnail')" />
            <x-form.textarea name="excerpt" required>{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body" required>{{ old('body') }}</x-form.textarea>

            <x-form.field>
                <div class="mb-2">
                    <x-form.label name="category" />
                </div>

                <select name="category_id" id="category_id" required>
                    <option value="">Select Category</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
