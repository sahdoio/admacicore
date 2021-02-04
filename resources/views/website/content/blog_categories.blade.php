@if(isset($blog_categories) && count($blog_categories))
    <div class="blog-side-item">
        <div class="category">
            <h3 class="title">
                Categorias
            </h3>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('blog') }}">
                        <h3 class="category-title">
                            <i class="fa fa-tag pr-10"></i>
                            &nbsp;
                            Todas
                        </h3>
                    </a>
                </li>
                @foreach($blog_categories as $category)
                    <li>
                        <a href="{{ route('blog', ['category' => $category->id]) }}">
                            <h3 class="category-title">
                                <i class="fa fa-tag pr-10"></i>
                                &nbsp;
                                {{ $category->name }}
                            </h3>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif