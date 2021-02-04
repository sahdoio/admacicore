import React from 'react';
import ReactDOM from 'react-dom';

function BaseApp() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-12">
                    <div className="card" class='text-center'>
                        <div className="card-header">
                            <h2>Base App Component</h2>
                        </div>
                        <div className="card-body">
                            <h3>I'm the base component!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default BaseApp;

if (document.getElementById('BaseApp')) {
    ReactDOM.render(<BaseApp />, document.getElementById('BaseApp'));
}
