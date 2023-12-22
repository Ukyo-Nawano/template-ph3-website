"use strict";

// 1回ボタンを押すと押せなくする//
const setDisabled = (buttons) => {
    buttons.forEach((button) => {
        button.disabled = true;
    });
};

document.addEventListener("DOMContentLoaded", function () {
    const quizAll = document.querySelectorAll(".quiz_all");

    quizAll.forEach((quiz) => {
        const answerChoices = quiz.querySelectorAll(".quiz_block_answer_button");
        const quizTrue = quiz.querySelector(".quiz_right");
        const quizFalse = quiz.querySelector(".quiz_false");
        const choices = quiz.querySelectorAll(".choice");

        choices.forEach((choice) => {
            choice.addEventListener("click", () => {
                setDisabled(answerChoices);
                if (choice.getAttribute("data-correct") === "1") {
                    choice.classList.add("correct");
                    console.log("ボタンがクリックされました");
                    quizTrue.style.display = "block";
                } else {
                    choice.classList.add("correct");
                    quizFalse.style.display = "block";
                }
            });
        });
    });
});

// modal画面 実際にクイズを削除する
document.addEventListener("DOMContentLoaded", function () {
    const deleteModalOpen = document.querySelectorAll(".delete_modal_open");
    const modal = document.getElementById("modalMain");
    const modalOverlay = document.getElementById("modalOverlay");
    const deleteForm = document.getElementById("delete_form");
    const cancelButton = document.getElementById("cancelButton");
    const closeButton = document.getElementById("close");

    deleteModalOpen.forEach((button) => {
        button.addEventListener("click", () => {
            const quizId = button.dataset.quizId;
            deleteForm.action = `/admin/${quizId}`;
            modal.style.display = "block";
            modalOverlay.style.display = "block";
            modal.classList.add("active");
            modal.classList.remove("nonactive");
        });
    });

    cancelButton.addEventListener("click", modalClose);
    closeButton.addEventListener("click", modalClose);
    modalOverlay.addEventListener("click", modalClose);
    function modalClose() {
        modalOverlay.style.display = "none";
        modal.style.display = "none";
        modal.classList.add("nonactive");
        modal.classList.remove("active");
    }
});

// modal画面 実際に設問を削除する
document.addEventListener("DOMContentLoaded", function () {
    const deleteModalOpen = document.querySelectorAll(
        ".delete_question_modal_open"
    );
    const modal = document.getElementById("modalMain");
    const modalOverlay = document.getElementById("modalOverlay");
    const deleteForm = document.getElementById("delete_question_form");
    const cancelButton = document.getElementById("cancelButton");
    const closeButton = document.getElementById("close");

    deleteModalOpen.forEach((button) => {
        button.addEventListener("click", () => {
            const id = button.dataset.questionId;
            deleteForm.action = `/admin/question/${id}`;
            modal.style.display = "block";
            modalOverlay.style.display = "block";
            modal.classList.add("active");
            modal.classList.remove("nonactive");
            console.log(id);
        });
    });

    cancelButton.addEventListener("click", modalClose);
    closeButton.addEventListener("click", modalClose);
    modalOverlay.addEventListener("click", modalClose);

    function modalClose() {
        modalOverlay.style.display = "none";
        modal.style.display = "none";
        modal.classList.add("nonactive");
        modal.classList.remove("active");
    }
});

// const isCorrect = choice.dataset.correct === '1';
// const resultElement = choice.nextElementSibling;
// resultElement.textContent = isCorrect ? '正解！' : '不正解！';
// resultElement.classList.remove('hidden');
