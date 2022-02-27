chat avec {{ $receiver->name }}
<div id="messages">
    @foreach ($messages as $message)
        <p>{{ $message->message }}</p>
    @endforeach


</div>


@csrf
<input type="text" id="message" class="form-control">
<input type="hidden" id="receiver" value="{{ $receiver->id }}">
<input type="hidden" id="sender" value="{{ auth()->user()->id }}">
<button id="send" class="btn btn-success">envoyer</button>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="application/javascript">
    var btn = document.getElementById('send');

    function load() {
        var sender = document.getElementById('sender').value;
        var receiver = document.getElementById('receiver').value;
        var content = document.getElementById('messages');
        axios.get('/getmessage/' + receiver).then((res) => {
            console.log(res.data)
            content.innerHTML = ''
            for (var i = 0; i < res.data.length; i++) {
                console.log(res.data[i].message);
                var newDiv = document.createElement("p");
                newDiv.innerHTML = res.data[i]['message']
                console.log(newDiv);
                content.appendChild(newDiv);
            }
        })
    }
    document.getElementById('send').addEventListener('click', onClick)

    function onClick() {
        console.log('test');

        var sender = document.getElementById('sender').value;
        var receiver = document.getElementById('receiver').value;
        var message = document.getElementById('message').value;
        var token = document.querySelector('input[name="_token"]').value;
        var data = {
            sender: sender,
            receiver: receiver,
            message: message,
            _token: token,
        }
        axios.post('/sendmessage', {
            data
        }).then((res) => {

            document.getElementById('message').value = "";

            load();
        })

    }

    setInterval(() => {
        load()
    }, 5000);
</script>
