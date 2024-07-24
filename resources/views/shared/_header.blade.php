<header class="rounded-4 overflow-hidden my-5">
    <div class="bg-image text-white rounded-4 overflow-hidden"
         style="
     background-image: url({{ $imgUrl ?? 'https://via.placeholder.com/1200x400' }});
     height: 400px;
     background-size: cover;
     background-position: center;
     position: relative;"
    >
        <div class="d-flex justify-content-center align-items-center h-100"
             style="background-color: rgba(0, 0, 0, 0.5);">
            <h1 class="display-4">{{ $title ?? ''}}</h1>
        </div>
    </div>
</header>
