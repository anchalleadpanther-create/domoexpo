document.querySelectorAll('.claim-history-btn').forEach((btns) => {
    btns.addEventListener('click', async (btn) => {
        const id = btn.target.dataset.id;
        console.log(btn.target);
        try {
            console.log(route('admin.get-warranty-claim-history', id));
            const response = await axios.get(route('admin.get-warranty-claim-history', id));
            document.querySelector('.show-history').innerHTML = response.data.data
                .map((history, index) => {
                    return `
                        <tr>
                          <th scope="row">${++index}</th>
                          <td>${new Date(history.created_at).toISOString().split('T')[0]}</td>
                          <td>${history.status}</td>
                          <td>${history.comment}</td>
                        </tr>
                        `;
                })
                .join(' ');
        } catch (error) {
            if (error.hasOwnProperty('response')) {
                console.log(error.response.data.message);
            } else {
                console.log(error.message);
            }
        }
    });
});
