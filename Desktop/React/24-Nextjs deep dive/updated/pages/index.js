import { MongoClient } from "mongodb";
import MeetupList from "../components/meetups/MeetupList";
import { Fragment } from "react";
import Head from "next/head";

// const DUMMY_MEETUPS = [
//     {
//       id: 'm1',
//       title: 'A First Meetup',
//       image:
//         'https://upload.wikimedia.org/wikipedia/commons/d/d3/Stadtbild_M%C3%BCnchen.jpg',
//       address: 'Some address 5, 12345 Some City',
//       description: 'This is a first meetup.',
//     },
//     {
//       id: 'm2',
//       title: 'A Second Meetup',
//       image:
//         'https://upload.wikimedia.org/wikipedia/commons/d/d3/Stadtbild_M%C3%BCnchen.jpg',
//       address: 'Some address 10, 12345 Some City',
//       description: 'This is a second meetup.',
//     },
//   ];

export default function HomePage(props) {
  return (
    <Fragment>
      <Head>
        <title>Meetups</title>
        <meta name="description" content="Mettup page made with react." />
      </Head>
      <MeetupList meetups={props.meetups} />
    </Fragment>
  );
}

// export async function getServerSideProps(context) {
//   const req = context.req;
//   const res = context.res;

//   return {
//     props: {
//       meetups: DUMMY_MEETUPS,
//     }
//   }
// }

export async function getStaticProps() {
  const client = await MongoClient.connect(
    "mongodb+srv://erYbus:LVYByFO608lyfR2d@cluster0.kgmrjxt.mongodb.net/meetups?retryWrites=true&w=majority"
  );

  const db = client.db();

  const meetupCollection = db.collection("meetups");

  const meetups = await meetupCollection.find().toArray();

  client.close();

  return {
    props: {
      meetups: meetups.map((meetup) => ({
        title: meetup.title,
        image: meetup.image,
        address: meetup.address,
        id: meetup._id.toString(),
      })),
    },
    revalidate: 10,
  };
}
