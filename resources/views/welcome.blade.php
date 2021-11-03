<div>
    <select name="month" id="month" multiple>
        <option
            value="{{ \Carbon\Carbon::now()->addMonth(-5)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-5)->format('m') }}</option>
        <option
            value="{{ \Carbon\Carbon::now()->addMonth(-4)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-4)->format('m') }}</option>
        <option
            value="{{ \Carbon\Carbon::now()->addMonth(-3)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-3)->format('m') }}</option>
        <option
            value="{{ \Carbon\Carbon::now()->addMonth(-2)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-2)->format('m') }}</option>
        <option
            value="{{ \Carbon\Carbon::now()->addMonth(-1)->format('m') }}">{{ \Carbon\Carbon::now()->addMonth(-1)->format('m') }}</option>
        <option
                value="{{ \Carbon\Carbon::now()->format('m') }}">{{ \Carbon\Carbon::now()->format('m') }}</option>
    </select>
</div>
<div id="selected">
</div>

<script>
    var select = document.getElementById("month");
    select.addEventListener('change', function () {
        const selected = [];

        for (const option of document.getElementById('month').options)
        {
            if (option.selected) {
                selected.push(option.value);
            }
        }

        urlParams = '';

        for (var i=0; i<selected.length; ++i) {
            if (urlParams.indexOf('?') === -1) {
                urlParams = urlParams + '?months[]=' + selected[i];
            }else {
                urlParams = urlParams + '&months[]=' + selected[i];
            }
        }

        const newStat = httpGet(`/api/select${urlParams}`);
        const info = document.getElementById(`selected`);
        info.innerHTML = '';
        const newStatParsed = JSON.parse(newStat).selectedMonth;

        selected.forEach(select => {
            const currentSelected = newStatParsed.find((item) => {
                return parseInt(item.month) == parseInt(select)
            } )

            if (currentSelected) {
                info.innerHTML += `<div>${select} : ${currentSelected.cnt}</div>`;
            } else {
                info.innerHTML += `<div>${select} : 0</div>`;
            }
        })
    });

    function httpGet(theUrl) {
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.send(null);
        return xmlHttp.responseText;
    }
</script>
