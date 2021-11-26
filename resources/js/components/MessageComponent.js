import React, {useEffect} from 'react';
import ReactDOM from 'react-dom';

function MessageComponent() {

    useEffect(() => {
        Pusher.logToConsole = true;

        var pusher = new Pusher('a7c0ed1eb15315d845c2', {
          cluster: 'mt1'
        });
    
        var channel = pusher.subscribe('my-pusher');
        channel.bind('NewMessage', function(data) {
          alert(JSON.stringify(data));
        });

        return () => {
            console.log('clean up');
        }
    }, [])

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">MessageComponent Component</div>

                        <div className="card-body">I'm an MessageComponent component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default MessageComponent;

if (document.getElementById('message-component')) {
    ReactDOM.render(<MessageComponent />, document.getElementById('message-component'));
}

