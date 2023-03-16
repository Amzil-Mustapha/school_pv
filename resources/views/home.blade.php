@include('layouts.header')
<main class="flex-1">
    <form action="" method="post">
        @csrf
        <select id="selectYear">
            <option value="1">1A</option>
            <option value="2">2A</option>
            <option value="12">1A & 2A</option>
        </select>
        <select name="" id="filierSelect">
        </select>
        <button type="submit">SELECT</button>
    </form>


</main>
@include('layouts.footer')
