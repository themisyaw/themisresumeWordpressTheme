
class WorkExpFilter {
    constructor(){
       
        this.WorkExpTimeline = document.querySelector('.timeline');
        this.addCategoryClickListener();
        this.get_workExp('All');
        console.log('?????');
    }
   get_workExp(categoryName) {
// If category is 'All', don't send the query param, or send it as empty
    const url = categoryName === 'All' 
        ? `${resumeCVData.root_url}/wp-json/custom/v1/posts` 
        : `${resumeCVData.root_url}/wp-json/custom/v1/posts?category=${categoryName}`;

    fetch(url)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })

    // fetch(`${resumeCVData.root_url}/wp-json/custom/v1/posts?category=${categoryName}`)
    //     .then(response => {
    //         if (!response.ok) throw new Error('Network response was not ok');
    //         return response.json();
    //     })
        .then(posts => {
            this.WorkExpTimeline.innerHTML = '';
            console.log('Fetched posts:', posts); // Debugging log
            
            posts.forEach(post => {
               
                const isCurrent = (post.to && post.to.current && post.to.current[0] === 'Current');
                const untilDate = (post.to && post.to.until_field) ? post.to.until_field : '';

                const element = `
                <li class="row my-5 fade-in-element show">
                  <div class="col pl-0">   
                    <div class="p-4 rounded shadow">
                      <div class="col-12 p-0 justify-content-start">
                        <h5 class="black2 bold">${post.title}</h5>                    
                      </div>  
                      <div class="col px-0">
                        <div class="row col-12">
                          <h6 class="bold black2 responsive-font">From |</h6>
                          <h6 class="gray2 pl-1 responsive-font">${post.from}</h6>
                        </div>
                        ${isCurrent 
                          ? `
                          <div class="col p-0">
                              <h6 class="bold black2 responsive-font">Current</h6>
                          </div>`
                          : `
                          <div class="row col-12">
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

                this.WorkExpTimeline.insertAdjacentHTML("afterbegin", element);
            });

            // Trigger the fade-in animation
            setTimeout(() => {
                const newFadeInElements = document.querySelectorAll('.fade-in-element');
                newFadeInElements.forEach(el => el.classList.add('show'));
            }, 100);
        })
        .catch(error => {
            console.error('Fetch operation failed:', error);
        });
}
    addCategoryClickListener() {
    // We attach to document so even if buttons are hidden/shown by Portfolio class, it works
    document.addEventListener('click', (event) => {
        
        // Check if the clicked element (or its parent) is a filter button
        const filterBtn = event.target.closest('.category-item') || event.target.closest('.filter-btn');
        
        if (filterBtn) {
            // .trim() is CRITICAL - it removes accidental spaces/newlines
            const categoryName = filterBtn.innerText.trim(); 
            
            // Run the fetch
            this.get_workExp(categoryName);

            // UI Feedback: Handle the active class
            const allBtns = document.querySelectorAll('.filter-btn, .category-item');
            allBtns.forEach(btn => btn.classList.remove('active-filter'));
            filterBtn.classList.add('active-filter');
        }
    });
}
   

}
export default WorkExpFilter;