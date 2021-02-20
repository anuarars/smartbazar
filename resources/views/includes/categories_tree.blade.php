@foreach($categories as $category)
    <li>
        <div @if(count($category->children)) class="text-bold" @endif>{{ $category->title }}</div>
        @if(count($category->children))
        <span onclick="this.form.submit()"> + </span>
        @else
            <span onclick=""> - </span>
        @endif
    </li>
