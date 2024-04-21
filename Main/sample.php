<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
   @import url(https://fonts.googleapis.com/css?family=Open+Sans:100);
 @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400);
 

body{
  font-family: 'Open Sans', sans-serif;
  font-size:1.2em;
    height: 100vh;
  margin: 0;  
  background: radial-gradient(ellipse farthest-corner at center top, #ECECEC, #999);
  color: #363c44;
  font-size: 14px;
  
}
.section{
  max-width:700px;
  margin:25px auto;
}
 /* flight plan */
    .tpd-body .flight-plain {
        margin-left: -15px;
        margin-right: -15px;
    }

        .tpd-body .flight-plain .f-lbl {
            font-size: 13px;
        }

        .tpd-body .flight-plain .fg-row {
            font-size: 14px;
        }

            .tpd-body .flight-plain .fg-row p.fg-prg {
            }

        .tpd-body .flight-plain .depart-row, .tpd-body .flight-plain .return-row {
            border-bottom: dashed 1px #d3d3d3;
            padding: 0 0 10px 0;
            margin-bottom: 10px;
        }

            .tpd-body .flight-plain .depart-row p.fg-prg i.fa {
                color: #3e67c0;
            }

            .tpd-body .flight-plain .return-row p.fg-prg i.fa {
                color: #fa364a;
            }

            /* end of flight plan */

            /* new flight plan */
.tp-flight-plan {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.2em;
    color: #363c44;
    font-size: 14px;
}
.tp-flight-plan .crop {
    position: relative;
    border: 1px solid #e2e2e2;
    border-radius: 3px;
    background-color: #fff;
    cursor: pointer;
    margin-bottom: 10px;
}

    .tp-flight-plan .crop .itin-det-btn {
        -ms-transition: all .25s ease 0s;
        -o-transition: all .25s ease 0s;
        -moz-transition: all .25s ease 0s;
        -webkit-transition: all .25s ease 0s;
        transition: all .25s ease 0s;
    }

    .tp-flight-plan .crop .itin-det-btn {
        text-decoration: none;
        outline: none;
        position: absolute;
        right: -10px;
        top: 25px;
        font-size: 14px;
        background-color: #FF5722;
        color: white;
        padding: 10px;
        border-radius: 5px;
        line-height: normal;
    }

        .tp-flight-plan .crop .itin-det-btn .fa {
            display: none;
        }

    .tp-flight-plan .crop .context.collapsed i.fa-chevron-down {
        display: block;
    }

.tp-flight-plan .crop .context:not(.collapsed) i.fa-chevron-up {
    display: block;
}

.tp-flight-plan .context {
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    align-items: stretch;
    padding: 10px;
    /* position: relative; */
    background: #f5f5f5;
}

.tp-flight-plan .crop .item {
    margin: 0px;
    display: flex;
    justify-content: center;
}

.tp-flight-plan .crop .trip-type {
    position: absolute;
    left: -5px;
    top: -19px;
    line-height: normal;
    background-color: #f5f5f5;
    border-radius: 3px;
    padding: 5px 10px 0;
    color: #FF9800;
    font-size: 11px;
    width: 85px;
    text-align: center;
}

    .tp-flight-plan .crop .trip-type.return {
        color: #ec397b;
        right: 0px;
        left: unset;
    }

.tp-flight-plan .item.it-1 {
    flex-grow: 5;
    display: flex;
    position: relative;
}

    .tp-flight-plan .item.it-1:before {
        content: "";
        position: absolute;
        width: calc(100% - 30px);
        height: 2px;
        /*background-color: #878787;*/
        border-top: dashed 1px #9E9E9E;
        top: 50%;
        left: 15px;
        margin-top: -1px;
    }

.tp-flight-plan .it-1 .port-seg {
    display: flex;
    flex: 3;
    position: relative;
}

    .tp-flight-plan .it-1 .port-seg .flight-seg {
        flex: 1;
        text-align: left;
        padding-bottom: 5px;
        padding-left: 5px;
    }

.tp-flight-plan .it-1 .flight-seg.origin {
    padding-left: 5px;
}

.tp-flight-plan .it-1 .flight-seg .time {
    font-size: 20px;
    color: #232b38;
    font-weight: 700;
}

.tp-flight-plan .it-1 .flight-seg .port {
    display: inline-block;
    background-color: #f5f5f5;
    padding: 0 25px 0 0;
    font-size: 16px;
    color: #878787;
    line-height: 1.2;
}

.tp-flight-plan .it-1 .flight-seg .name {
    font-size: 12px;
    color: #878787;
    line-height: 1.2;
}

.tp-flight-plan .it-1 .flight-seg.destination {
    text-align: right;
    padding-right: 15px;
}

.tp-flight-plan .flight-seg.destination .port {
    padding: 0 0 0 25px;
}

.tp-flight-plan .it-1 .airline-image {
    position: absolute;
    bottom: 0;
    width: 100%;
    display: flex;
    padding: 0 20px;
    height: 21px;
}

.tp-flight-plan .it-1 .img-wrapper {
    flex: 1;
    text-align: center;
    position: relative;
}

.tp-flight-plan .it-1 .top-label {
    color: #47cf73;
    font-size: 11px;
}

.tp-flight-plan .it-1 .df-text {
    position: absolute;
    top: -24px;
    left: 50%;
    transform: translate(-50%,-100%);
    font-size: 11px;
    color: #A2A9B3;
    text-align: center;
}

.tp-flight-plan .it-1 .top-label.has-stops {
    color: Red;
}

.tp-flight-plan .it-1 .top-label .stops {
    color: gray;
}

.tp-flight-plan .it-1 .route-dot span {
    position: absolute;
    background-color: #607d8ba3;
    /* background-color: #ff0000a3; */
    top: calc(50% - 4px);
    left: var(--data-left);
    border-radius: 10px;
    padding: 4px;
}

.tp-flight-plan .it-2 .al-name {
    display: block;
}

.tp-flight-plan .item.it-2 {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -webkit-box-align: center;
    align-items: center;
    background: #fff;
    border: 1px solid #ccc;
    flex-direction: column;
    flex: 2 2 100px;
}

    .tp-flight-plan .item.it-2 .dr-row {
        display: flex;
        flex-direction: row;
    }

    .tp-flight-plan .item.it-2 .airline-logo {
        max-width: 100%;
        max-height: 100%;
    }

    .tp-flight-plan .item.it-2 .take-tim {
        font-size: 12px;
        color: gray;
        line-height: 20px;
    }

.tp-flight-plan .item.it-3 {
    flex-grow: 2;
    text-align: center;
}

.tp-flight-plan .crop .fly-wrap {
    border-top: solid 1px #b5b5b5;
    padding: .75rem 1.5rem;
    color: #524c61;
}

    .tp-flight-plan .fly-wrap .fly-det .f-item {
        font-family: 'Roboto',"Helvetica Neue",Helvetica,Arial,sans-serif;
    }

.tp-flight-plan .fly-wrap .airway-title {
    padding-left: 13%;
    margin-bottom: .75rem;
    margin-top: 1.75rem;
}

.tp-flight-plan .fly-wrap .root-de {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
}

.tp-flight-plan .fly-wrap .times {
    display: inline-block;
    width: 6rem;
    font-size: 12px;
    line-height: 1.125rem;
    font-weight: 400;
    letter-spacing: normal;
    color: #A2A9B3;
}

.tp-flight-plan .fly-wrap .directs {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-positive: 1;
    flex-grow: 1;
    min-height: 3.75rem;
}

.tp-flight-plan .fly-wrap .itin-time {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding-top: .375rem;
    padding-bottom: .375rem;
    padding-right: 1.125rem;
}

    .tp-flight-plan .fly-wrap .itin-time:after,
    .tp-flight-plan .fly-wrap .itin-time:before {
        content: "";
        width: 10px;
        height: 10px;
        display: block;
        border-radius: 100%;
        background: #fff;
        border: 2px solid #b2aebd;
        z-index: 2;
    }

.tp-flight-plan .fly-wrap .itin-lines {
    display: -ms-flexbox;
    display: flex;
    position: relative;
    -ms-flex-positive: 1;
    flex-grow: 1;
    left: 4px;
    min-height: 2rem;
}

    .tp-flight-plan .fly-wrap .itin-lines:after {
        content: "";
        position: relative;
        width: 2px;
        background-color: #b2aebd;
    }

.tp-flight-plan .fly-wrap .hour-sm {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    margin-right: .75rem;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.tp-flight-plan .fly-wrap .hour-time-sm {
    position: relative;
    display: inline-block;
    padding-right: 1.125rem;
}

.tp-flight-plan .fly-wrap .itin-target {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-positive: 2;
    flex-grow: 2;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

    .tp-flight-plan .fly-wrap .itin-target .tar-label {
        display: inline-block;
    }

.tp-flight-plan .fly-wrap .welc {
    min-height: 20px;
    padding: 8px;
    margin: 10px 0;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
}

.tp-flight-plan .arrival-info {
    margin-top: 1.5rem;
    font-size: 12px;
    line-height: 1.125rem;
    font-weight: 400;
    letter-spacing: normal;
    border-top: solid 1px #cccccc;
    padding-top: 10px;
}

    .tp-flight-plan .fly-wrap .arrival-info .sub-span {
        margin-top: 1.5rem;
        font-size: 12px;
        line-height: 1.125rem;
        font-weight: 400;
        letter-spacing: normal;
        /* border-top: solid 1px #cccccc; */
        /* padding-top: 10px; */
    }

    .tp-flight-plan .fly-wrap .arrival-info .duration-info {
        margin-left: .75rem;
    }

.tp-flight-plan .anime-airplane {
    position: absolute;
    width: 30px;
    height: 25px;
    top: -87%;
    opacity: 0;
}

.tp-flight-plan .crop.depart .anime-airplane {
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    left: 10%;
    -webkit-animation: move 3s infinite;
    animation: move 3s infinite;
}

.tp-flight-plan .crop.return .anime-airplane {
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    right: 10%;
    -ms-transform: rotate(180deg); /* IE 9 */
    -webkit-transform: rotate(180deg); /* Safari */
    transform: rotate(180deg);
    -webkit-animation: move-right 3s infinite;
    animation: move-right 3s infinite;
}

.tp-flight-plan .crop.depart svg {
    fill: #3e67c0;
}

.tp-flight-plan .crop.return svg {
    fill: #e91e63;
}

@-webkit-keyframes move {
    40% {
        left: 50%;
        opacity: 1;
    }

    100% {
        left: 90%;
        opacity: 0;
    }
}

@-webkit-keyframes move-right {
    50% {
        right: 50%;
        opacity: 1;
    }

    100% {
        right: 90%;
        opacity: 0;
    }
}

@keyframes move {
    50% {
        left: 50%;
        opacity: 1;
    }

    100% {
        left: 90%;
        opacity: 0;
    }
}

@keyframes move-right {
    50% {
        right: 50%;
        opacity: 1;
    }

    100% {
        right: 90%;
        opacity: 0;
    }
}
            /* end of new flight plan*/

    </style>
</head>
<body>
<div class="section">
<div class="tpd-plan">
  <div class="tp-flight-plan">
                                                            <div class="container-fluid">
                                                                <div class="crop depart">
                                                                    <div class="context collapsed" data-toggle="collapse" data-target="#demo2">
                                                                        <a role="button" tabindex="0" class="tog-cal itin-det-btn">
                                                                            <i class="fa fa-chevron-up"></i>
                                                                            <i class="fa fa-chevron-down"></i>
                                                                        </a>
                                                                        <div class="item it-1">
                                                                            <label class="trip-type depart">Departure</label>
                                                                            <div class="route-dot">
                                                                                <span class="point" style="--data-left:35%"></span>
                                                                                <span class="point" style="--data-left:65%"></span>
                                                                            </div>
                                                                            <div class="airline-image">
                                                                                <div class="df-text">3 Hours</div>
                                                                                <span class="img-wrapper">
                                                                                    <svg class="anime-airplane">
                                                                                        <use xlink:href="#airplane"></use>
                                                                                    </svg>
                                                                                    <span class="top-label has-stops">2 Stops <span class="stops">CDG,SAW</span></span>
                                                                                </span>
                                                                            </div>

                                                                            <div class="port-seg">
                                                                                <div class="flight-seg origin">
                                                                                    <div class="time">10:30</div>
                                                                                    <div class="port">IST</div>
                                                                                    <div class="name">Istanbul</div>
                                                                                </div>
                                                                                <div class="flight-seg destination">
                                                                                    <div class="time">01:30</div>
                                                                                    <div class="port">ESB</div>
                                                                                    <div class="name">Ankara</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item it-2">
                                                                            <div class="dr-row">
                                                                                <span class="al-name">Pegasus</span>
                                                                                <img class="airline-logo" src="https://images.ucuzabilet.com/resources/img/flights-logo/logo25x19/25px-PC.png" />
                                                                            </div>
                                                                            <div class="take-tim">Wed, Jan 23, 2019</div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="demo2" class="fly-wrap collapse">
                                                                        <div class="fly-det">
                                                                            <div class="f-item">
                                                                                <div class="airway-title">
                                                                                    <img class="airline-logo" src="https://www.turkishairlines.com/theme/img/carrierairlines/carriercode_tk.png" /> <span>Turkish Airlines</span>
                                                                                </div>
                                                                                <div class="root-de">
                                                                                    <div class="times"> 4 Hour </div>
                                                                                    <div class="directs">
                                                                                        <div class="itin-time">
                                                                                            <div class="itin-lines"></div>
                                                                                        </div>

                                                                                        <div class="hour-sm">
                                                                                            <div class="hour-time-sm">02:10</div>

                                                                                            <div class="hour-time-sm">05:55</div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="itin-target">
                                                                                        <div class="tar-label">IST İstanbul Atatürk</div>
                                                                                        <div class="tar-label">BAH Bahreyn</div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="delay-frame">
                                                                            <div class="welc">
                                                                                7 hours delayed
                                                                            </div>
                                                                        </div>

                                                                        <div class="f-item">
                                                                            <div class="airway-title">
                                                                                <img class="airline-logo" src="https://www.turkishairlines.com/theme/img/carrierairlines/carriercode_tk.png" /> <span>Turkish Airlines</span>
                                                                            </div>
                                                                            <div class="root-de">
                                                                                <div class="times"> 4 Hour </div>
                                                                                <div class="directs">
                                                                                    <div class="itin-time">
                                                                                        <div class="itin-lines"></div>
                                                                                    </div>

                                                                                    <div class="hour-sm">
                                                                                        <div class="hour-time-sm">02:10</div>

                                                                                        <div class="hour-time-sm">05:55</div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="itin-target">
                                                                                    <div class="tar-label">IST İstanbul Atatürk</div>
                                                                                    <div class="tar-label">BAH Bahreyn</div>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                        <div class="arrival-info">
                                                                            <span class="sub-span">
                                                                                <strong>Arrives:</strong>
                                                                                Wed, Jan 23, 2019
                                                                            </span>

                                                                            <span class="sub-span duration-info">
                                                                                <strong>Journey duration:</strong>
                                                                                28h 35m
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="crop depart">
                                                                    <div class="context collapsed" data-toggle="collapse" data-target="#demo">
                                                                        <a role="button" tabindex="0" class="tog-cal itin-det-btn">
                                                                            <i class="fa fa-chevron-up"></i>
                                                                            <i class="fa fa-chevron-down"></i>
                                                                        </a>
                                                                        <div class="item it-1">
                                                                            <label class="trip-type depart">Departure</label>
                                                                            <div class="airline-image">
                                                                                <div class="df-text">8 Hours</div>
                                                                                <span class="img-wrapper">
                                                                                    <svg class="anime-airplane">
                                                                                        <use xlink:href="#airplane"></use>
                                                                                    </svg>
                                                                                    <span class="top-label">Direct</span>
                                                                                </span>
                                                                            </div>

                                                                            <div class="port-seg">
                                                                                <div class="flight-seg origin">
                                                                                    <div class="time">02:00</div>
                                                                                    <div class="port">IST</div>
                                                                                    <div class="name">Istanbul</div>
                                                                                </div>
                                                                                <div class="flight-seg destination">
                                                                                    <div class="time">10:20</div>
                                                                                    <div class="port">ESB</div>
                                                                                    <div class="name">Ankara</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item it-2">
                                                                            <div class="dr-row">
                                                                                <span class="al-name">Etihad</span>
                                                                                <img class="airline-logo" src="https://images.ucuzabilet.com/resources/img/flights-logo/logo25x19/25px-EY.png" />
                                                                            </div>
                                                                            <div class="take-tim">Wed, Jan 23, 2019</div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="demo" class="fly-wrap collapse">
                                                                        <div class="fly-det">
                                                                            <div class="f-item">
                                                                                <div class="airway-title">
                                                                                    <img class="airline-logo" src="https://www.turkishairlines.com/theme/img/carrierairlines/carriercode_tk.png" /> <span>Turkish Airlines</span>
                                                                                </div>
                                                                                <div class="root-de">
                                                                                    <div class="times"> 4 Hour </div>
                                                                                    <div class="directs">
                                                                                        <div class="itin-time">
                                                                                            <div class="itin-lines"></div>
                                                                                        </div>

                                                                                        <div class="hour-sm">
                                                                                            <div class="hour-time-sm">02:10</div>

                                                                                            <div class="hour-time-sm">05:55</div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="itin-target">
                                                                                        <div class="tar-label">IST İstanbul Atatürk</div>
                                                                                        <div class="tar-label">BAH Bahreyn</div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="arrival-info">
                                                                            <span class="sub-span">
                                                                                <strong>Arrives:</strong>
                                                                                Wed, Jan 23, 2019
                                                                            </span>

                                                                            <span class="sub-span duration-info">
                                                                                <strong>Journey duration:</strong>
                                                                                28h 35m
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="crop return">
                                                                    <div class="context collapsed" data-toggle="collapse" data-target="#demo3">
                                                                        <a role="button" tabindex="0" class="tog-cal itin-det-btn">
                                                                            <i class="fa fa-chevron-up"></i>
                                                                            <i class="fa fa-chevron-down"></i>
                                                                        </a>
                                                                        <div class="item it-1">
                                                                            <label class="trip-type return">Return</label>
                                                                            <div class="route-dot">
                                                                                <span class="point" style="--data-left:55%"></span>
                                                                                <span class="point" style="--data-left:65%"></span>
                                                                            </div>
                                                                            <div class="airline-image">
                                                                                <div class="df-text">12 Hours</div>
                                                                                <span class="img-wrapper">
                                                                                    <svg class="anime-airplane">
                                                                                        <use xlink:href="#airplane"></use>
                                                                                    </svg>
                                                                                    <span class="top-label has-stops">2 Stops <span class="stops">CDG,SAW</span></span>
                                                                                </span>
                                                                            </div>

                                                                            <div class="port-seg">
                                                                                <div class="flight-seg origin">
                                                                                    <div class="time">03:30</div>
                                                                                    <div class="port">IST</div>
                                                                                    <div class="name">Istanbul</div>
                                                                                </div>
                                                                                <div class="flight-seg destination">
                                                                                    <div class="time">06:30</div>
                                                                                    <div class="port">ESB</div>
                                                                                    <div class="name">Ankara</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item it-2">
                                                                            <div class="dr-row">
                                                                                <span class="al-name">Pegasus</span>
                                                                                <img class="airline-logo" src="https://images.ucuzabilet.com/resources/img/flights-logo/logo25x19/25px-PC.png" />
                                                                            </div>
                                                                            <div class="take-tim">Wed, Jan 23, 2019</div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="demo3" class="fly-wrap collapse">
                                                                        <div class="fly-det">
                                                                            <div class="f-item">
                                                                                <div class="airway-title">
                                                                                    <img class="airline-logo" src="https://www.turkishairlines.com/theme/img/carrierairlines/carriercode_tk.png" /> <span>Turkish Airlines</span>
                                                                                </div>
                                                                                <div class="root-de">
                                                                                    <div class="times"> 4 Hour </div>
                                                                                    <div class="directs">
                                                                                        <div class="itin-time">
                                                                                            <div class="itin-lines"></div>
                                                                                        </div>

                                                                                        <div class="hour-sm">
                                                                                            <div class="hour-time-sm">02:10</div>

                                                                                            <div class="hour-time-sm">05:55</div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="itin-target">
                                                                                        <div class="tar-label">IST İstanbul Atatürk</div>
                                                                                        <div class="tar-label">BAH Bahreyn</div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="delay-frame">
                                                                            <div class="welc">
                                                                                7 hours delayed
                                                                            </div>
                                                                        </div>

                                                                        <div class="f-item">
                                                                            <div class="airway-title">
                                                                                <img class="airline-logo" src="https://www.turkishairlines.com/theme/img/carrierairlines/carriercode_tk.png" /> <span>Turkish Airlines</span>
                                                                            </div>
                                                                            <div class="root-de">
                                                                                <div class="times"> 4 Hour </div>
                                                                                <div class="directs">
                                                                                    <div class="itin-time">
                                                                                        <div class="itin-lines"></div>
                                                                                    </div>

                                                                                    <div class="hour-sm">
                                                                                        <div class="hour-time-sm">02:10</div>

                                                                                        <div class="hour-time-sm">05:55</div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="itin-target">
                                                                                    <div class="tar-label">IST İstanbul Atatürk</div>
                                                                                    <div class="tar-label">BAH Bahreyn</div>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                        <div class="arrival-info">
                                                                            <span class="sub-span">
                                                                                <strong>Arrives:</strong>
                                                                                Wed, Jan 23, 2019
                                                                            </span>

                                                                            <span class="sub-span duration-info">
                                                                                <strong>Journey duration:</strong>
                                                                                28h 35m
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
</div>
  <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
  <symbol  id="airplane" viewBox="243.5 245.183 25 21.633">
    <g>
      <path d="M251.966,266.816h1.242l6.11-8.784l5.711,0.2c2.995-0.102,3.472-2.027,3.472-2.308
                              c0-0.281-0.63-2.184-3.472-2.157l-5.711,0.2l-6.11-8.785h-1.242l1.67,8.983l-6.535,0.229l-2.281-3.28h-0.561v3.566
                              c-0.437,0.257-0.738,0.724-0.757,1.266c-0.02,0.583,0.288,1.101,0.757,1.376v3.563h0.561l2.281-3.279l6.535,0.229L251.966,266.816z
                              "/>
    </g>
  </symbol>
</svg>
</div>


</body>
</html>