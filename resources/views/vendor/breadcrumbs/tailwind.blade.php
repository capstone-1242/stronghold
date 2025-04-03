<div class="breadcrumbs">
    @unless ($breadcrumbs->isEmpty())
        <nav>
            <ol class="p-3 rounded flex flex-wrap items-center gap-2">
                @foreach ($breadcrumbs as $breadcrumb)
    
                    @if ($loop->first)
                        <li>
                            <a href="{{ $breadcrumb->url }}" class="hover:underline focus:underline">
                                <svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <title>Home</title>
                                    <path d="M12.5 0L23.3253 11.25H1.67468L12.5 0Z" fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20 8H5V19H10V13H15V19H20V8Z" fill="white"/>
                                </svg>                           
                            </a>
                        </li>
                    @elseif ($breadcrumb->url && !$loop->last)
                        <li>
                            <a href="{{ $breadcrumb->url }}" class="hover:underline focus:underline">
                                {{ $breadcrumb->title }}
                            </a>
                        </li>
                    @else
                        <li>
                            {{ $breadcrumb->title }}
                        </li>
                    @endif
    
                    @unless($loop->last)
                        <li class="px-2">
                            <svg width="10" height="13" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.5L7 7.5L1 13.5" stroke="#ADD9ED" stroke-width="2"/>
                            </svg> 
                        </li>
                    @endif
    
                @endforeach
            </ol>
        </nav>
    @endunless
</div>