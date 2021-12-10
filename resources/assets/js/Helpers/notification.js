class Notification {
    success(){
        new Noty({
            type:'success',
            layout:"topRight",
            text: 'Successfully done!!!',
            timeout:3000,
            theme    : 'mint',
            closeWith: ['click', 'button'],
            animation: {
                open : 'animated fadeInRight',
                close: 'animated fadeOutRight'
            }
        }).show();
    }

    alert(){
        new Noty({
            type:'alert',
            layout:"topRight",
            text: 'Are you sure?',
            timeout:3000,
            theme    : 'mint',
            closeWith: ['click', 'button'],
            animation: {
                open : 'animated fadeInRight',
                close: 'animated fadeOutRight'
            }
        }).show();
    }

    error(){
        new Noty({
            type:'error',
            layout:"topRight",
            text: 'Something went wrong!',
            timeout:3000,
            theme    : 'mint',
            closeWith: ['click', 'button'],
            animation: {
                open : 'animated fadeInRight',
                close: 'animated fadeOutRight'
            }
        }).show();
    }

    warning(){
        new Noty({
            type:'warning',
            layout:"topRight",
            text: 'Opps wrong!',
            timeout:3000,
            theme    : 'mint',
            closeWith: ['click', 'button'],
            animation: {
                open : 'animated fadeInRight',
                close: 'animated fadeOutRight'
            }
        }).show();
    }

}

export default Notification=new Notification();
