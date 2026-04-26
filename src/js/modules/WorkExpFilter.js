
import Animator from './animator.js';
class WorkExpFilter {
    constructor() {
        this.WorkExpTimeline = document.querySelector('.timeline');
        this.addCategoryClickListener();
        this.get_workExp('All');
    }

    async get_workExp(categoryName) {
        const url = categoryName === 'All' 
            ? `${resumeCVData.root_url}/wp-json/custom/v1/posts` 
            : `${resumeCVData.root_url}/wp-json/custom/v1/posts?category=${categoryName}`;

        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const posts = await response.json();
            this.WorkExpTimeline.innerHTML = '';

            posts.forEach(post => {
                const isCurrent = (post.to && post.to.current && post.to.current[0] === 'Current');
                
                const element = `
                <li class="row my-5 pl-2"> 
                    <div class="col p-0 inner-content"> <div class="p-4 rounded shadow">
                            <div class="col-12 p-0 justify-content-start">
                                <h4 class="black2 bold pb-4">${post.title}</h4>                    
                            </div>
                            <div class="col px-0">
                                <div class="row col-12">
                                    <h6 class="bold black2 responsive-font">From |</h6>
                                    <h6 class="gray2 pl-1 responsive-font">${post.from}</h6>
                                </div>
                                ${isCurrent 
                                    ? `<div class="col p-0"><h6 class="bold black2 responsive-font">Current</h6></div>`
                                    : `<div class="row col-12">
                                          <h6 class="bold black2 responsive-font">To |</h6>
                                          <h6 class="gray2 pl-1 responsive-font">${post.to}</h6>
                                       </div>` 
                                }
                            </div> 
                            <div class="col px-0 pt-3 mt-2">
                                <div class="col-12">
                                    <div class="row">
                                        <h6 class="bold black2 responsive-font">Company | </h6>
                                        <h6 class="gray2 mr-3 pl-1 responsive-font">${post.company}</h6>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <h6 class="bold black2 responsive-font">Location | </h6>
                                        <h6 class="gray2 pl-1 responsive-font">${post.location}</h6>
                                    </div>
                                </div>            
                            </div>
                            <div class="col p-0 pt-3 mt-2">
                                <div class="col p-0">
                                    <h6 class="bold black2">Description</h6>
                                    ${post.description}
                                </div>
                            </div>                
                        </div>              
                    </div>
                </li>`;

                this.WorkExpTimeline.insertAdjacentHTML("beforeend", element);
            });

            // Hand off the animation work to the Animator module
            Animator.observeAndShow('.inner-content');

        } catch (error) {
            console.error('Fetch operation failed:', error);
            this.WorkExpTimeline.innerHTML = `<p class="text-center">Error loading experience.</p>`;
        }
    }

    addCategoryClickListener() {
        document.addEventListener('click', (event) => {
            const filterBtn = event.target.closest('.category-item') || event.target.closest('.filter-btn');
            if (filterBtn) {
                const categoryName = filterBtn.dataset.category; 
                this.get_workExp(categoryName);

                const allBtns = document.querySelectorAll('.filter-btn, .category-item');
                allBtns.forEach(btn => btn.classList.remove('active-filter'));
                filterBtn.classList.add('active-filter');
            }
        });
    }
}

export default WorkExpFilter;