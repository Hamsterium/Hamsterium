// Obtener elementos
const openModalBtn = document.getElementById('openModalBtn');
const walletModal = document.getElementById('walletModal');
const closeBtn = document.querySelector('.close-btn');
const connectWalletBtn = document.getElementById('connectWallet');
const cancelWalletBtn = document.getElementById('cancelWallet');
const statusMessage = document.getElementById('statusMessage');

// Abrir el modal
openModalBtn.addEventListener('click', () => {
    walletModal.style.display = 'flex';
});

// Cerrar el modal
closeBtn.addEventListener('click', () => {
    walletModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === walletModal) {
        walletModal.style.display = 'none';
    }
});

// Conectar la billetera
connectWalletBtn.addEventListener('click', () => {
    statusMessage.textContent = 'Connecting to your TON wallet...';

    fetch('wallet_connect.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ userId: 1 }) // Reemplaza 1 con el ID del usuario real
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            statusMessage.textContent = data.message;
        } else {
            statusMessage.textContent = 'Oops, try again. Something went wrong!';
        }
    })
    .catch(error => {
        statusMessage.textContent = 'Error connecting to wallet.';
    });
});

// Cancelar la conexión de la billetera
cancelWalletBtn.addEventListener('click', () => {
    walletModal.style.display = 'none';
    statusMessage.textContent = '';
});
