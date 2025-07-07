<x-layout title="Home">
    <section class="container">
        <div class="banner-wrapper">
            <div class="banner">
                <img id="slide1" src="{{ asset('images\bannertest1.png') }}" alt="Image 1"/>
                <img id="slide2" src="{{ asset('images\bannertest2.png') }}" alt="Image 2"/>
                <img id="slide3" src="{{ asset('images\bannertest3.png') }}" alt="Image 3"/>
            </div>
            <div class="banner-nav">
                <a href="#slide1"></a>
                <a href="#slide2"></a>
                <a href="#slide3"></a>
            </div>
        </div>
        <div class="home-cards">
            <div class="card">
                <h2>About:</h2>
                <p>Formula Drift is a competitive motorsport where drivers compete in a bracket style competition where the top 32 drivers face off against each other in 2 one versus one battles.</p>
                <p>This is where each driver will “drift” their cars in zones set around a course depending on what track they are at.</p>
                <p>Each driver will do a lead run and a chase run, the lead drivers role is to do a perfect run of the course and the chase drivers role is to drift as closely to the lead driver as possible.<br><br></p>
                <p>Each driver builds and designs their own car to compete in, this can depend on if they are independent or if they are part of an organisation that allows them to drift competitively.</p>
                <p>Each season of Formula Drift consists of 8 locations with a different track layout each season.</p>
                <p>Each location consists of Seeding 16, Qualifying, Top 32, Top 16, Great 8, Final Battle.</p>
            </div>
            <div class="card">
                <h2>Key features:</h2>
                <p>These are some of the main features that this web page includes.<br><br></p>
                <p>Driver profiles with detailed info</p>
                <p>Track information and maps</p>
                <p>Driver score cards for each track from the past 3 years</p>
                <p>Prediction system that calculates the top 3 drivers and gives you a percentage of what the chances of the 3 drivers winning next year</p>
                <p>User account system with unique user profile</p>
                <p>Selections for supported dirvers and favourite track</p>
                <p>Comment sections for each track</p>
            </div>
            <div class="card">
                <h2>Tips on how to use:</h2>
                <p>These are some tips to help you get started<br><br></p>
                <p>Create a user account to see all features</p>
                <p>Click on drivers in the tab to see a list of all the drivers</p>
                <p>Click the shedule tab to select a track you would like to veiw</p>
                <p>The driver score cards display the points scored that year and the position they came</p>
                <p>Click the predictions tab to veiw  predictions per track, including each top driver's average score and win probability</p>
                <p>When you select a favourite driver or track these are automatically shown on your profile page: Account ↓ -> Profile</p>
                <p>Use the search bar to instantly find your favourite drivers profile</p>
            </div>
        </div>
    </section>
</x-layout>
