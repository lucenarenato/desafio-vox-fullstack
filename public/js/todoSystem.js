document.addEventListener("DOMContentLoaded", function () {
    const addNewCardBtns = document.querySelectorAll(".add_new_card_btn");

    addNewCardBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const listId = btn.parentElement.id.replace("list_", "");
            const newCardForm = createNewCardForm(listId);
            btn.insertAdjacentHTML("beforebegin", newCardForm);
        });
    });

    function createNewCardForm(listId) {
        return `
            <form action="/cards" method="POST" class="new-card-form">
                @csrf
                <input type="text" name="title" placeholder="Enter card title" required />
                <input type="hidden" name="list_id" value="${listId}" />
                <button type="submit">Add</button>
            </form>
        `;
    }
});
