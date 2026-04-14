class Portfolio {

    constructor(){

        this.workexperienceBTN = document.querySelector(".workexperiencebtn");
        this.portfolioBTN = document.querySelector(".portfoliobtn");
        this.educationBTN = document.querySelector(".educationBtn");

        this.workexperienceSection = document.querySelector(".workexperienceSection");
        this.educationSection = document.querySelector(".educationSection");
        this.portfolioSection = document.querySelector(".portfolioSection");
        this.collapsedButtons = document.querySelectorAll('.collapsible-btn'); 
        this.downloadPdfBtn = document.getElementById('download_Btn');

        this.events();
        if (window.innerWidth >= 992) {
            this.portfolioSection.classList.add('d-none');
        }
        if (window.innerWidth <= 992) {
            this.educationSection.classList.remove('d-none');
            this.educationSection.classList.add('d-block');
            this.workexperienceSection.classList.remove('d-none');
            this.workexperienceSection.classList.add('d-block');
            
        }  
       
    }
    events(){
        if(this.workexperienceBTN){
            this.workexperienceBTN.addEventListener("click",this.displayWorkExperience.bind(this));
        }
        if(this.portfolioBTN){
            this.portfolioBTN.addEventListener("click",this.displayPortfolio.bind(this));
        }
        if(this.educationBTN){
            this.educationBTN.addEventListener("click",this.displayEducation.bind(this));
        }
        this.collapsedButtons.forEach(button => {
            button.addEventListener("click",this.toggleContent);
        });

    }
   
    toggleContent(e) {
       
        const buttonID = e.target.closest('.collapsible-btn').id // Get the button ID
        const postID = buttonID.replace('btn-toggle-', ''); // Extract the post ID
        const contentID = `content-toggle-${postID}`; // Construct the content ID
        const collapsibleContent = document.querySelector(`#${contentID}`); // Get the content element
    
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
    displayWorkExperience(){

        this.workexperienceSection.classList.remove('d-none');
        this.educationSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-block');

        this.workexperienceSection.classList.add('d-block');
        this.educationSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-none');


        this.portfolioBTN.classList.remove("active-filter");
        this.educationBTN.classList.remove('active-filter');
        this.workexperienceBTN.classList.add('active-filter');

       
    }
    displayEducation(){
        this.workexperienceSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-block');
        this.educationSection.classList.remove('d-none');
        
        this.workexperienceSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-none');
        this.educationSection.classList.add('d-block');

        this.portfolioBTN.classList.remove("active-filter");
        this.workexperienceBTN.classList.remove('active-filter');
        this.educationBTN.classList.add('active-filter');

    }
    displayPortfolio(){

        this.workexperienceSection.classList.remove('d-block');
        this.educationSection.classList.remove('d-block');
        this.portfolioSection.classList.remove('d-none');
        
        this.workexperienceSection.classList.add('d-none');
        this.educationSection.classList.add('d-none');
        this.portfolioSection.classList.add('d-block');

        this.portfolioBTN.classList.add('active-filter');
        this.workexperienceBTN.classList.remove('active-filter');
        this.educationBTN.classList.remove('active-filter');
        

    }
}
export default Portfolio;