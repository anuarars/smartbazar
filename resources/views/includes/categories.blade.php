@foreach ($categories as $category)
    <option value="{{$category->id}}" @if(isset($product) && $category == $product->category) selected @endif>
        {!! $delimiter !!}
        {{$category->title}}
    </option>
    @if (count($category->children)>0){
        @include('includes.categories',[
            'categories'=>$category->children,
            'delimiter'=> ' - '.$delimiter
        ])
    }
    @endif
@endforeach
