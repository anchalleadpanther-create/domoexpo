"use strict";
import { handleMessage } from "../customer/helpers.js";




document.addEventListener('DOMContentLoaded', function() {
    // View Email Modal
    document.querySelectorAll('.view-email-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const historyId = btn.dataset.id;
            try {
                const response = await axios.get(`/admin/payment-report/${historyId}/email-preview`);
                document.getElementById('emailContent').innerHTML = response.data.html;
                document.querySelector('.send-email-confirm').dataset.historyId = historyId;
                document.querySelector('.send-email-confirm').style.display = 'inline-block';
                new bootstrap.Modal(document.getElementById('emailModal')).show();
            } catch (error) {
                handleMessage('error', 'Error!', 'Failed to load email preview');
            }
        });
    });

    // Send Email (Table + Modal)
    document.querySelectorAll('.send-email-btn, .send-email-confirm').forEach(btn => {
        btn.addEventListener('click', async () => {
            const historyId = btn.dataset.historyId || btn.dataset.id;
            try {
                await axios.post(`/admin/payment-report/${historyId}/send-email`);
                handleMessage('success', 'Success!', 'Email sent successfully!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('emailModal'));
                // if (modal) modal.hide();
            } catch (error) {
                handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to send email');
            }
        });
    });
});
