<?php

use ThirdRailPackages\PifParser\StringFactory;

include __DIR__ . '/../vendor/autoload.php';

$pif = <<<PIF
REF	A	ACT	*	Supression of traffic stop indicator
REF	A	ACT	-D	Stops to detach vehicles                            D D D
REF	A	ACT	-T	Stops to attach and detach vehicles                 DUDUDU
REF	A	ACT	-U	Stops to attach vehicles                            U U U
REF	A	ACT	A	Stops or shunts for other trains to pass            * * *
REF	A	ACT	AE	Attach/Detach assisting locomotive                  AEAEAE
REF	A	ACT	AX	Shows as 'X' on arrival                             X   X
REF	A	ACT	BL	Stops for banking locomotive                        BLBLBL
REF	A	ACT	C	Stops to change traincrew ONLY                      C C C
REF	A	ACT	D	Stops to set down passengers (shows 's' in GBTT)    D D D s   s
REF	A	ACT	DX	Stops to set down Red Star parcels
REF	A	ACT	E	Stops for examination                               E E E
REF	A	ACT	G	GBPRTT Data to add
REF	A	ACT	H	Notional activity to prevent WTT columns merge
REF	A	ACT	HH	As H, to prevent WTT column merge where 3rd Column
REF	A	ACT	K	Passenger count point
REF	A	ACT	KC	Ticket collection and examination point
REF	A	ACT	KE	Ticket examination point
REF	A	ACT	KF	Ticket examination point - first class only
REF	A	ACT	KS	Selective Ticket Examination Point
REF	A	ACT	L	Stops to change locomotive                          L L L
REF	A	ACT	N	Stop not advertised                                 N N N
REF	A	ACT	NX	Red Star Parcels not set down or picked up
REF	A	ACT	OP	Stops for other operating reasons                   OPOPOP
REF	A	ACT	OR	Train Locomotive on rear                            OROROR
REF	A	ACT	PR	Propelling between points shown                     PRPRPR
REF	A	ACT	R	Stops when required (shows 'x' in GBTT)             R R R x x x
REF	A	ACT	RM	Stops for reversing move or driver changes ends     RMRMRM
REF	A	ACT	RR	Stops for locomotive to run round train             RRRRRR
REF	A	ACT	S	Stops for Railway Personnel Only                    S S S
REF	A	ACT	T	Stops to Take Up and Set Down passengers
REF	A	ACT	TB	Train Begins (Origin)
REF	A	ACT	TF	Train Finishes (Destination)
REF	A	ACT	TS	Activity requested for TOPS reporting purposes      TSTSTS
REF	A	ACT	TW	Stops or passes for tablet, staff or token          t t t
REF	A	ACT	U	Stops to take up passengers (shows 'u' in GBTT)     U U U   u u
REF	A	ACT	UX	Stops to pick up Red Star parcels
REF	A	ACT	V	Train diverted VIA (not sent to TSDB)
REF	A	ACT	VV	Do not show diversion (not sent to TSDB)
REF	A	ACT	W	Stops for watering of coaches                       W W W
REF	A	ACT	X	Passes another train at crossing point on single linX   X
REF	A	ACT	x{	Suppress running line indication
REF	A	ACT	{	Force running line indication
REF	A	ACT	{}	Force path & line indications
REF	A	ACT	}	Force path indication
PIF;

foreach (StringFactory::make($pif) as $row) {
    var_dump($row);
}
