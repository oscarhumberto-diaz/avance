<h1>Nueva página</h1>
<form action="{{ route('admin.pages.store') }}" method="post">
    @include('admin.pages._form')
</form>
