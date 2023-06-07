@section('title', 'Not found 404')

<style>
    .not-found-page-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
    }

    .not-found-page-wrapper > div {
        gap: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }


</style>

<div class="not-found-page-wrapper">
    <div>
        <h3>Unable find your page...! Not Found 404</h3>
        <img src="{{ asset('img/404.png') }}" alt="" width="150px">
        <a href="/"
            style="text-decoration:none;"
        >Return home</a>
    </div>
</div>
