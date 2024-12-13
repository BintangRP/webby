import { generateInsight } from '../../public/ts/mistralClient.ts';
import axios from 'axios';

const form = document.getElementById('generateForm');
const result = document.getElementById('result');
const insightContent = document.getElementById('insightContent');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    document.getElementById('loadingSpinner').style.display = 'flex';

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
        document.getElementById('loadingSpinner').style.display = 'none';
        return;
    }

    try {
        if (window.auth.daily_generations >= 5) {
            Swal.fire({
                title: 'Generation Limit Reached',
                text: 'You have reached your daily generation limit. Upgrade to Buddy Pro Plan for unlimited generations!',
                icon: 'warning',
                confirmButtonColor: '#2f27ce',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            document.getElementById('loadingSpinner').style.display = 'none';
            return;
        }

        const businessField = document.getElementById('bidangBisnis').value
        const targetMarket = document.getElementById('targetPasar').value
        const insight = await generateInsight(businessField, targetMarket);

        const response = await axios.post('/api/generate-insight', {
            user_id: window.auth.id,
            business_field: businessField,
            target_market: targetMarket,
            insight: insight
        });

        insightContent.innerText = insight;
        result.classList.remove('hidden');
        result.scrollIntoView({ behavior: 'smooth' });
        document.getElementById('loadingSpinner').style.display = 'none';
    } catch (error) {
        Swal.fire({
            title: 'Error',
            text: `An error occurred: ${error.response?.data?.message || error.message}`,
            icon: 'error',
            confirmButtonColor: '#2f27ce',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        document.getElementById('loadingSpinner').style.display = 'none';
    }

});
