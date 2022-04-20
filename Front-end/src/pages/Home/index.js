import Indexnavbar from '../../components/Navbar/Indexnavbar';
import EventCard from '../../components/Navbar/cards/eventCard';
import Footer from '../../components/footer/Indexfooter';

function Home() {
  return (
    <div className="App">
      <Indexnavbar/>
    <main className='bg-gray-100 py-16 px-6'>
      <div className='flex mt-8 grid grid-cols-2'>
        <div className='bg-green-900'>
          <EventCard/>
        </div>
        <div className='bg-red-900'>
        </div>
      </div>
    </main>
    <Footer/>
    </div>
  );
}

export default Home;
