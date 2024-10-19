<div>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            </div>
        </div>
    </section>
    <!-- End Banner Area -->


    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
            <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
                <div class="flex flex-wrap mb-24 -mx-3">
                    <div class="w-full pr-2 lg:w-1/4 lg:block">
                        <div class="p-4 mb-5 bg-white border border-gray-200 dark:border-gray-900 dark:bg-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400"> Categories</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                            <ul>
                                @foreach($categories as $category)
                                <li class="mb-4" wire:key="{{$category->id}}">
                                    <label for="{{$category->slug}}" class="flex items-center dark:text-gray-400 ">
                                        <input type="checkbox" wire:model.live="selected_categories" id="{{$category->slug}}" value="{{$category->id}}" class="w-4 h-4 mr-2">
                                        <span class="text-lg">{{$category->name}}</span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Brand</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                            <ul>
                                @foreach($brands as $brand)
                                <li class="mb-4" wire:key="{{$brand->id}}">
                                    <label for="{{$brand->slug}}" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" id="{{$brand->slug}}" wire:model.live="selected_brands" value="{{$brand->id}}" class="w-4 h-4 mr-2">
                                        <span class="text-lg dark:text-gray-400">{{$brand->name}}</span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                            <ul>
                                <li class="mb-4">
                                    <label for="featured" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" id="featured" wire:model.live="featured" value="1" class="w-4 h-4 mr-2">
                                        <span class="text-lg dark:text-gray-400">Is Featured</span>
                                    </label>
                                </li>
                                <li class="mb-4">
                                    <label for="sale" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" id="sale" value="1" wire:model.live="sale" class="w-4 h-4 mr-2">
                                        <span class="text-lg dark:text-gray-400">On Sale</span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                            <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                            <div>
                                <div class="font-semibold">{{Number::currency($price_range, 'NPR')}}</div>
                                <input type="range" wire:model.live="price_range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" min="1000" max="500000" value="300000" step="1000">
                                <div class="flex justify-between ">
                                    <span class="inline-block text-base font-semibold text-blue-400 ">{{Number::currency(1000, 'NPR')}}</span>
                                    <span class="inline-block text-base font-semibold text-blue-400 ">{{Number::currency(500000, 'NPR')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 lg:w-3/4">
                        <div class="px-3 mb-4">
                            <div class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex dark:bg-gray-900 ">
                                <div class="flex items-center justify-between">
                                    <select wire:model.live="sorting" id="sorting" name="sorting" class="block w-40 text-base bg-gray-100 cursor-pointer dark:text-gray-400 dark:bg-gray-900 pt-2">
                                        <option value="latest">Sort by latest</option>
                                        <option value="price">Sort by Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center ">

                            @foreach($products as $product)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{$product->id}}">
                                <div class="border border-gray-300 dark:border-gray-700">
                                    <div class="relative bg-gray-200">
                                        <!-- Favorite Button -->
                                        <!-- <button wire:click.prevent="toggleFavorite({{$product->id}})" class="absolute top-2 right-2 bg-transparent rounded-full p-3 text-gray-500 hover:text-red-500 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="w-6 h-6 bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514 3.11 4.075 6.235l.905 1.03.905-1.03C9.486 3.11 12.4.28 9.716 2.011L8 2.748zm4.952-1.319c-1.528-1.533-4.02-1.428-5.66.217L8 2.287l-.293-.313C6.02.001 3.535-.096 2.004 1.43c-1.56 1.548-1.458 4.032.284 5.676l5.236 5.454c.281.293.676.293.957 0l5.236-5.454c1.742-1.645 1.844-4.128.284-5.676z" />
                                            </svg>
                                        </button> -->

                                        <a href="/product/{{$product->slug}}" wire:navigate class="h-screen">
                                            <img src="{{url('storage', $product->images[0])}}" alt="{{$product->name}}" class="max-h-full m-auto object-cover w-full h-56 mx-auto ">
                                        </a>
                                    </div>
                                    <div class="p-3 ">
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-medium dark:text-gray-400">
                                                {{$product->name}}
                                            </h3>
                                        </div>
                                        <p class="text-lg ">
                                            <span class="text-green-600 dark:text-green-600">{{Number::currency($product->price, 'NPR')}}</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">

                                        <a wire:click.prevent="addToCart({{$product->id}})" href="#" class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                            </svg><span wire:loading.remove wire:target="addToCart({{$product->id}})">Add to Cart</span>
                                            <span wire:loading wire:target="addToCart({{$product->id}})">Adding...</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- pagination start -->
                        <div class="flex justify-end mt-6">
                            {{$products->links()}}
                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>