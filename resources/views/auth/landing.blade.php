<x-front>
  @section('jsconfig')
  <script>
    window.app = {
      url: {
        ajaxSearch: "{{ route('ajax.job.search')}}",
        search: "{{ route('search')}}",
      }
    }
  </script>
  @endsection

  @push('css')
  <style>
    .searchbar {
      padding: 2rem 0;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    
    .job-section {
      padding: 2rem 0;
    }
    
    .job-card {
      transition: all 0.3s ease;
      height: 100%;
      border: 1px solid #e2e8f0;
      border-radius: 0.5rem;
      overflow: hidden;
    }
    
    .job-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .job-link {
      text-decoration: none;
      color: inherit;
      display: block;
      height: 100%;
    }
    
    .job-link:hover {
      color: inherit;
    }
    
    .job-card .card-body {
      padding: 1.25rem;
    }
    
    .job-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: #2d3748;
    }
    
    .company-name {
      font-size: 0.9rem;
      color: #4a5568;
      margin-bottom: 0.25rem;
    }
    
    .job-location {
      font-size: 0.85rem;
      color: #718096;
    }
    
    .job-meta {
      font-size: 0.85rem;
      margin: 0.75rem 0;
    }
    
    .job-meta p {
      margin-bottom: 0.25rem;
    }
    
    .salary-range {
      font-weight: 600;
      color: #2d3748;
    }
    
    .job-tags {
      margin-top: 1rem;
    }
    
    .tag {
      display: inline-block;
      background-color: #edf2f7;
      color: #4a5568;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      margin: 0.15rem;
    }
    
    .applied-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #48bb78;
      color: white;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      font-weight: 600;
    }
    
    .search-header {
      color: #2d3748;
      margin-bottom: 1.5rem;
    }
    
    .bg-light-sky {
      background-color: #f0f9ff;
    }
    
    .pagination-wrap {
      display: flex;
      justify-content: center;
      margin-top: 2rem;
    }
    
    .no-jobs {
      text-align: center;
      padding: 3rem;
      color: #718096;
    }
    
    .no-jobs i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #cbd5e0;
    }
    
    @media (max-width: 768px) {
      .job-card {
        margin-bottom: 1.5rem;
      }
    }
  </style>
  @endpush

  @push('js')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add smooth scrolling to search form
      const searchForm = document.getElementById('searchForm');
      if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
          e.preventDefault();
          const jobSection = document.querySelector('.job-section');
          if (jobSection) {
            jobSection.scrollIntoView({ behavior: 'smooth' });
          }
          // You can add AJAX search functionality here later
        });
      }
    });
  </script>
  @endpush

  <section class="searchbar">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="card card-outline card-primary shadow-sm">
            <div class="card-header text-center bg-white py-4">
              <h2 class="search-header">Find Your Dream Job</h2>
              <p class="text-muted mb-0">Search from thousands of opportunities</p>
            </div>
            <div class="card-body bg-light-sky py-4">
              <form id="searchForm" action="{{ route('search') }}" method="GET">
                <div class="row g-3">
                  <div class="col-md-4">
                    <label for="jobTitle" class="form-label visually-hidden">Job Title</label>
                    <job-title-search></job-title-search>
                  </div>
                  <div class="col-md-4">
                    <label for="jobSkills" class="form-label visually-hidden">Skills</label>
                    <job-skill-search></job-skill-search>
                  </div>
                  <div class="col-md-4">
                    <label for="jobLocation" class="form-label visually-hidden">Location</label>
                    <job-city-search></job-city-search>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                      <i class="fas fa-search me-2"></i>Search Jobs
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="job-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">All Jobs</h4>
                <span class="badge bg-primary">{{ $jobs->total() }} Jobs Found</span>
              </div>
            </div>
            <div class="card-body p-3">
              @if($jobs->count() > 0)
                <div class="row">
                  @foreach ($jobs as $job)
                  <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                    @if(!applicationHasUser($job->applications, auth()->id()))
                    <a class="job-link" href="{{ route('job.view', $job->slug) }}">
                    @endif
                      <div class="job-card card h-100">
                        @if (applicationHasUser($job->applications, auth()->id()))
                        <span class="applied-badge">Applied</span>
                        @endif
                        
                        <div class="card-body">
                          <h3 class="job-title">{{ Illuminate\Support\Str::limit($job->title, 30) }}</h3>
                          
                          <p class="company-name">
                            <i class="fas fa-building me-1 text-primary"></i>
                            {{ $job->company_name }}
                          </p>
                          
                          <p class="job-location">
                            <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                            <strong>{{ $job->city->name }}</strong>
                          </p>
                          
                          <div class="job-meta">
                            <p>
                              <i class="fas fa-tag me-1 text-info"></i>
                              <strong>Category:</strong> {{ $job->category->name }}
                            </p>
                            <p>
                              <i class="fas fa-briefcase me-1 text-warning"></i>
                              {{ renderJobType($job->type) }}
                            </p>
                            <p>
                              <i class="fas fa-money-bill-wave me-1 text-success"></i>
                              <strong>Salary:</strong> 
                              <span class="salary-range">
                                Rs. {{ thousandsCurrencyFormat($job->monthly_salary_min) }} - 
                                {{ thousandsCurrencyFormat($job->monthly_salary_max) }}
                              </span>
                            </p>
                            <p>
                              <i class="fas fa-clock me-1 text-secondary"></i>
                              <strong>Posted</strong> {{ $job->created_at->diffForHumans() }}
                            </p>
                          </div>
                          
                          @if($job->skills->count() > 0)
                          <div class="job-tags">
                            @foreach ($job->skills->take(3) as $skill)
                            <span class="tag">{{ $skill->name }}</span>
                            @endforeach
                            @if($job->skills->count() > 3)
                            <span class="tag">+{{ $job->skills->count() - 3 }} more</span>
                            @endif
                          </div>
                          @endif
                        </div>
                      </div>
                    @if(!applicationHasUser($job->applications, auth()->id()))
                    </a>
                    @endif
                  </div>
                  @endforeach
                </div>
              @else
                <div class="no-jobs">
                  <i class="fas fa-search"></i>
                  <h3>No Jobs Found</h3>
                  <p>Try adjusting your search criteria or browse all categories</p>
                </div>
              @endif
            </div>
            
            @if($jobs->hasPages())
            <div class="card-footer bg-white py-3">
              <div class="pagination-wrap">
                {{ $jobs->links() }}
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</x-front>