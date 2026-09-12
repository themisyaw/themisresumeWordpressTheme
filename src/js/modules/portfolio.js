class Portfolio {

    constructor(){

        this.workexperienceBTNs = document.querySelectorAll(".workexperiencebtn");
        this.portfolioBTNs = document.querySelectorAll(".portfoliobtn");
        this.educationBTNs = document.querySelectorAll(".educationBtn");

        this.workexperienceSection = document.querySelector(".workexperienceSection");
        this.educationSection = document.querySelector(".educationSection");
        this.portfolioSection = document.querySelector(".portfolioSection");
        this.collapsedButtons = document.querySelectorAll('.collapsible-btn');
        this.downloadPdfBtn = document.getElementById('download_Btn');

        this.events();

        this.educationSection.classList.add('d-none');
        this.educationSection.classList.remove('d-block');
        this.workexperienceSection.classList.add('d-none');
        this.workexperienceSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-none');
        this.portfolioSection.classList.add('d-block');
    }
    events(){
        this.workexperienceBTNs.forEach(btn => btn.addEventListener("click", this.displayWorkExperience.bind(this)));
        this.portfolioBTNs.forEach(btn => btn.addEventListener("click", this.displayPortfolio.bind(this)));
        this.educationBTNs.forEach(btn => btn.addEventListener("click", this.displayEducation.bind(this)));

        this.collapsedButtons.forEach(button => {
            button.addEventListener("click",this.toggleContent);
        });

    }

    toggleContent(e) {

        const buttonID = e.target.closest('.collapsible-btn').id
        const postID = buttonID.replace('btn-toggle-', '');
        const contentID = `content-toggle-${postID}`;
        const collapsibleContent = document.querySelector(`#${contentID}`);

        if (!collapsibleContent) {
            console.error('No collapsible content found for ID:', contentID);
            return;
        }

        if (collapsibleContent.style.maxHeight) {
            collapsibleContent.style.maxHeight = null;

        } else {
            collapsibleContent.style.maxHeight = collapsibleContent.scrollHeight + "px";

        }


    }
    setActive(activeBTNs) {
        [this.portfolioBTNs, this.workexperienceBTNs, this.educationBTNs].forEach(group => {
            group.forEach(btn => btn.classList.toggle('active-filter', group === activeBTNs));
        });
    }
    displayWorkExperience(){

        this.workexperienceSection.classList.remove('d-none');
        this.educationSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-block');

        this.workexperienceSection.classList.add('d-block');
        this.educationSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-none');

        this.setActive(this.workexperienceBTNs);
    }
    displayEducation(){
        this.workexperienceSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-block');
        this.educationSection.classList.remove('d-none');

        this.workexperienceSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-none');
        this.educationSection.classList.add('d-block');

        this.setActive(this.educationBTNs);
    }
    displayPortfolio(){

        this.workexperienceSection.classList.remove('d-block');
        this.educationSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-none');

        this.workexperienceSection.classList.add('d-none');
        this.educationSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-block');

        this.setActive(this.portfolioBTNs);
    }
}
export default Portfolio;
