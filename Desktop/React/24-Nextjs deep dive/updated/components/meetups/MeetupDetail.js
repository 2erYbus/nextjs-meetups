import { Fragment } from "react";
import classes from './MeetupDetail.module.css'

export default function MeetupDetail(props) {
  return (
    <Fragment>
      <section className={classes.container}>
        <img
          src={props.image}
          alt={props.title}
        />
        <h1>{props.title}</h1>
        <address>{props.address}</address>
        <p>{props.description}</p>
      </section>
    </Fragment>
  );
}


