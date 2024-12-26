<x-layout>
<x-slot:title>{{$title}}</x-slot:title>

  @foreach ($posts as $post)
  <article class="py-8 mx-w-screen-md border-b border-gray-300">
  <a href="/posts/{{$post['slug']}}" class="hover:underline">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{$post['title']}}</h2>
    </a>

    <div class="text-gray-500 text-base">
      <a href"#">{{$post ['author']}}</a> | 25 December 2024
    </div>

    <p class="my-4 font-light">
      {{Str::limit($post ['body'],150)}}
    </p>
    <a href="/posts/{{$post['slug']}}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
  </article>
  @endforeach


 
</x-layout>