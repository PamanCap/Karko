<!DOCTYPE html>
<html>
<head>

    <title>Karko</title>
    <link
        rel="icon"
        href="{{ asset('Component 1.png') }}"
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-100">


<div class="flex min-h-screen">


    {{-- SIDEBAR --}}
    @include('partials.sidebar')



    {{-- CONTENT --}}
    <main 
        id="content"
        class="flex-1 p-10 transition-all duration-300 ml-64"
    >

        @yield('content')

    </main>


</div>



<script>

const btn = document.getElementById('toggleSidebar');

const sidebar = document.getElementById('sidebar');

const content = document.getElementById('content');


btn.addEventListener('click',()=>{


    sidebar.classList.toggle('w-64');

    sidebar.classList.toggle('w-20');


    content.classList.toggle('ml-64');

    content.classList.toggle('ml-20');


    document.querySelectorAll('.menu-text')
        .forEach(item=>{

            item.classList.toggle('hidden');

        });


});


</script>


</body>
</html>