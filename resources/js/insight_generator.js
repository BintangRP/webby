import { generateInsight } from './mistralClient.js';
import axios from 'axios';

const form = document.getElementById('generateForm');
const result = document.getElementById('result');
const insightContent = document.getElementById('insightContent');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (!window.auth) {
        Swal.fire({
            title: 'Login Required',
            text: 'Please login to generate business insights',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#2f27ce',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/login';
            }
        });
        return;
    }

    try {
        businessField = document.getElementById('bidangBisnis').value
        targetMarket = document.getElementById('targetPasar').value
        const insight = await generateInsight(businessField, targetMarket);

        const response = await axios.post('/api/generate-insight', {
            user_id: window.auth.id,
            business_field: businessField,
            target_market: targetMarket,
            insight: insight
        });

        const responseData = await response.json();

        if (response.data.error) {
            Swal.fire({
                title: 'Generation Limit Reached',
                text: 'You have reached your daily generation limit. Upgrade to Pro Plan for unlimited generations!',
                icon: 'warning',
                confirmButtonColor: '#2f27ce',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            return;
        }

        insightContent.innerHTML = responseData.insight;
        result.classList.remove('hidden');
        result.scrollIntoView({ behavior: 'smooth' });
    } catch (error) {
        Swal.fire({
            title: 'Error',
            text: 'An error occurred while generating the insight',
            icon: 'error',
            confirmButtonColor: '#2f27ce',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    }

});

function copyToClipboard() {
    navigator.clipboard.writeText(insightContent.innerText);
    showToast('Copied to clipboard!');
}

function shareInsight() {
    if (navigator.share) {
        navigator.share({
            title: 'Business Insight',
            text: insightContent.innerText
        }).catch(() => {
            showToast('Unable to share');
        });
    } else {
        showToast('Sharing not supported on this device');
    }
}

function printInsight() {
    window.print();
}

async function saveInsight() {
    try {
        await axios.post('/api/save-insight', {
            business_field: document.getElementById('bidangBisnis').value,
            target_market: document.getElementById('targetPasar').value,
            content: insightContent.innerText
        });
        showToast('Insight saved successfully');
    } catch (error) {
        showToast('Failed to save insight', 'error');
    }
}

function deleteInsight() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#2f27ce',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            result.classList.add('hidden');
            insightContent.innerHTML = '';
            showToast('Insight deleted');
        }
    });
}

function showToast(message, type = 'success') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        showClass: {
            popup: 'animate__animated animate__fadeInRight'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutRight'
        }
    });

    Toast.fire({
        icon: type,
        title: message
    });
}
