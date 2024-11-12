import './bootstrap';



/*
const messageInput = document.getElementById('message-input');
const nameInput = document.getElementById('name-input');
const messageContainer = document.getElementById('message-container');
const messageCount = document.getElementById('count');
let totalMessages = 0;

window.Echo.channel('my-channel')
    .listen('.my-event', function(data) {
        // Determine the class based on whether the message is from the current user or not
        const messageClass = data.name === nameInput.value ? 'message-right' : 'message-left';

        // Append the received message to the message container with appropriate styling
        const messageDiv = document.createElement('div');
        messageDiv.classList.add(messageClass);
        messageDiv.innerHTML = `<strong>${data.name}:</strong> ${data.message}`;
        messageContainer.appendChild(messageDiv);

        // Update the message count
        totalMessages++;
        messageCount.textContent = totalMessages;
    });


messageInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        const message = messageInput.value;
        const name = nameInput.value; // Get the name from the input field

        // Send the message and name to the backend
        axios.post('/send-message', { message, name })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error(error);
            });

        // Clear the input fields
        messageInput.value = '';
        nameInput.value = '';
    }
});
*/



// Echo.channel
Echo.private('notifications')
    .listen('UserSessionChanged', (e) => {
         const notificationElement = document.getElementById('notification');

         notificationElement.innerText = e.message;

         notificationElement.classList.remove('invisible');
         notificationElement.classList.remove('alert-success');
         notificationElement.classList.remove('alert-danger');

        notificationElement.classList.add('alert-' + e.type);
    });


Echo.channel('users')
    .listen('UserCreated', (e) => {
        const usersElement = document.getElementById('users');

        let element = document.createElement('li');

        element.setAttribute('id', e.user.id);
        element.innerText = e.user.name;

        usersElement.appendChild(element);
    })
    .listen('UserUpdated', (e) => {
        let element = document.getElementById(e.user.id);

        element.innerText = e.user.name;

    })
    .listen('UserDeleted', (e) => {
        let element = document.getElementById(e.user.id);
        element.parentNode.removeChild(element);
    })
const circleElement = document.getElementById('circle');
const timerElement = document.getElementById('timer');
const winnerElement = document.getElementById('winner');
const betElement = document.getElementById('bet');
const resultElement = document.getElementById('result');

Echo.channel('game')
    .listen('RemainingTimeChanged', (e) => {
        timerElement.innerHTML = e.time;

        circleElement.classList.add('refresh');

        winnerElement.classList.add('d-none');

        resultElement.innerHTML = '';
        winnerElement.classList.remove('text-success');
        winnerElement.classList.remove('text-danger');
    })
    .listen('WinnerNumberGenerated', (e) => {

        circleElement.classList.remove('refresh');

        let winner = e.number;
        winnerElement.innerText = winner;
        winnerElement.classList.remove('d-none');

        let bet = betElement[betElement.selectedIndex].innerText;

        if (bet == winner){
            resultElement.innerText = 'You WIN';
            resultElement.classList.add('text-success');
        }else{
            resultElement.innerText = 'You LOSE';
            resultElement.classList.add('text-danger');
        }

    })



const usersElement = document.getElementById('users');

Echo.join('chat')
    .here((users) => {
        users.forEach((user, index) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);
            element.innerText = user.name;

            usersElement.appendChild(element);
        })
    })
    .joining((user) => {
        let element = document.createElement('li');

        element.setAttribute('id', user.id);
        element.innerText = user.name;

        usersElement.appendChild(element);
    })
    .leaving((user) => {
        let element = document.getElementById(user.id);
        element.parentNode.removeChild(element)
    })


const sendElement = document.getElementById('send');
const messageElement = document.getElementById('message');

sendElement.addEventListener('click', (e) => {
    e.preventDefault();

    window.axios.post('/chat/message', {
        message: messageElement.value
    })

    messageElement.value = '';
})
