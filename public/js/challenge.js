document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".btn-choose-challenge");
    const challengeGroups = document.querySelectorAll(".challenge-group");
    const initialImage = document.getElementById("initialImage");

    challengeGroups.forEach((group) => {
        group.style.display = "none";
    });

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            initialImage.style.display = "none";

            const target = this.getAttribute("data-target");

            challengeGroups.forEach((group) => {
                group.style.display = "none";
            });

            const selectedGroup = document.querySelector(
                `.challenge-group.${target}`
            );
            if (selectedGroup) {
                selectedGroup.style.display = "block";
            }
        });
    });
});
