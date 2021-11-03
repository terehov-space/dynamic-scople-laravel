<div>
    <select name="month" id="month">
        <option value="{{ \Carbon\Carbon::now()->addMonth(-5)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-5)->format('m') }}</option>
        <option value="{{ \Carbon\Carbon::now()->addMonth(-4)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-4)->format('m') }}</option>
        <option value="{{ \Carbon\Carbon::now()->addMonth(-3)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-3)->format('m') }}</option>
        <option value="{{ \Carbon\Carbon::now()->addMonth(-2)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-2)->format('m') }}</option>
        <option value="{{ \Carbon\Carbon::now()->addMonth(-1)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-1)->format('m') }}</option>
        <option selected value="{{ \Carbon\Carbon::now()->format('m') }}">{{ \Carbon\Carbon::now()->format('m') }}</option>
    </select>
</div>
<div>
    Registered users: <span id="count">{{ $selectedMonthUsersCount }}</span>
</div>

<script>
    var select = document.getElementById("month");
    select.addEventListener('change', function () {
       const newMonth = this.value;

       const newStat = httpGet(`/api/select/${newMonth}`);

        const count = document.getElementById("count");
        count.innerText = JSON.parse(newStat).selectedMonth;
    });

    function httpGet(theUrl)
    {
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }
</script>
