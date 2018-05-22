--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3 (Ubuntu 10.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.categories (
    catid integer NOT NULL,
    catname character varying(225) NOT NULL
);


ALTER TABLE public.categories OWNER TO aaxshfcnahrbwi;

--
-- Name: categories_catid_seq; Type: SEQUENCE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE SEQUENCE public.categories_catid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_catid_seq OWNER TO aaxshfcnahrbwi;

--
-- Name: categories_catid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER SEQUENCE public.categories_catid_seq OWNED BY public.categories.catid;


--
-- Name: client; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.client (
    userid integer NOT NULL,
    userfirstname character varying(225) NOT NULL,
    userlastname character varying(225) NOT NULL,
    useremail character varying(225) NOT NULL,
    apptid integer
);


ALTER TABLE public.client OWNER TO aaxshfcnahrbwi;

--
-- Name: client_userid_seq; Type: SEQUENCE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE SEQUENCE public.client_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.client_userid_seq OWNER TO aaxshfcnahrbwi;

--
-- Name: client_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER SEQUENCE public.client_userid_seq OWNED BY public.client.userid;


--
-- Name: inventory; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.inventory (
    invid integer NOT NULL,
    invname character varying(225) NOT NULL,
    invdesc text NOT NULL,
    invimg character varying(225) DEFAULT '/images/noImg.jpg'::character varying,
    invprice numeric(18,2) NOT NULL,
    catnum integer NOT NULL
);


ALTER TABLE public.inventory OWNER TO aaxshfcnahrbwi;

--
-- Name: inventory_invid_seq; Type: SEQUENCE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE SEQUENCE public.inventory_invid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventory_invid_seq OWNER TO aaxshfcnahrbwi;

--
-- Name: inventory_invid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER SEQUENCE public.inventory_invid_seq OWNED BY public.inventory.invid;


--
-- Name: photoshoots; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.photoshoots (
    psid integer NOT NULL,
    psname character varying(225) NOT NULL,
    psprice numeric(18,2) NOT NULL,
    pstime integer NOT NULL
);


ALTER TABLE public.photoshoots OWNER TO aaxshfcnahrbwi;

--
-- Name: photoshoots_psid_seq; Type: SEQUENCE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE SEQUENCE public.photoshoots_psid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.photoshoots_psid_seq OWNER TO aaxshfcnahrbwi;

--
-- Name: photoshoots_psid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER SEQUENCE public.photoshoots_psid_seq OWNED BY public.photoshoots.psid;


--
-- Name: schedule; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.schedule (
    apptid integer NOT NULL,
    appttaken integer NOT NULL,
    apptdate character varying(225) NOT NULL,
    appttime character varying(225) NOT NULL,
    apptpaid integer,
    psavailable integer,
    psselected integer
);


ALTER TABLE public.schedule OWNER TO aaxshfcnahrbwi;

--
-- Name: schedule_apptid_seq; Type: SEQUENCE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE SEQUENCE public.schedule_apptid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.schedule_apptid_seq OWNER TO aaxshfcnahrbwi;

--
-- Name: schedule_apptid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER SEQUENCE public.schedule_apptid_seq OWNED BY public.schedule.apptid;


--
-- Name: weather; Type: TABLE; Schema: public; Owner: aaxshfcnahrbwi
--

CREATE TABLE public.weather (
    city character varying(80),
    temp_lo integer,
    temp_hi integer,
    prcp real,
    date date
);


ALTER TABLE public.weather OWNER TO aaxshfcnahrbwi;

--
-- Name: categories catid; Type: DEFAULT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.categories ALTER COLUMN catid SET DEFAULT nextval('public.categories_catid_seq'::regclass);


--
-- Name: client userid; Type: DEFAULT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.client ALTER COLUMN userid SET DEFAULT nextval('public.client_userid_seq'::regclass);


--
-- Name: inventory invid; Type: DEFAULT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.inventory ALTER COLUMN invid SET DEFAULT nextval('public.inventory_invid_seq'::regclass);


--
-- Name: photoshoots psid; Type: DEFAULT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.photoshoots ALTER COLUMN psid SET DEFAULT nextval('public.photoshoots_psid_seq'::regclass);


--
-- Name: schedule apptid; Type: DEFAULT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.schedule ALTER COLUMN apptid SET DEFAULT nextval('public.schedule_apptid_seq'::regclass);


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.categories (catid, catname) FROM stdin;
1	Baby
2	Toddler
\.


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.client (userid, userfirstname, userlastname, useremail, apptid) FROM stdin;
\.


--
-- Data for Name: inventory; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.inventory (invid, invname, invdesc, invimg, invprice, catnum) FROM stdin;
3	Straight Lines Gym	This baby gym with it"s straight lines gives it a modern, clean feel that will add to the style of your home	/images/straightGym.jpg	57.45	1
5	Curved Gym	This baby gym with it"s curves gives it a sleek, modern look that will add to the style of your home with it”s warm wood texture	/images/curveGym.jpg	63.23	1
7	Rag Doll	This rag doll is soft and adorable.	/images/noImg.jpg	17.43	2
\.


--
-- Data for Name: photoshoots; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.photoshoots (psid, psname, psprice, pstime) FROM stdin;
1	Newborn	130.54	2
2	Graduation	180.23	3
\.


--
-- Data for Name: schedule; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.schedule (apptid, appttaken, apptdate, appttime, apptpaid, psavailable, psselected) FROM stdin;
\.


--
-- Data for Name: weather; Type: TABLE DATA; Schema: public; Owner: aaxshfcnahrbwi
--

COPY public.weather (city, temp_lo, temp_hi, prcp, date) FROM stdin;
San Francisco	46	50	0.25	1994-11-27
San Francisco	43	57	0	1994-11-29
Hayward	37	54	\N	1994-11-29
\.


--
-- Name: categories_catid_seq; Type: SEQUENCE SET; Schema: public; Owner: aaxshfcnahrbwi
--

SELECT pg_catalog.setval('public.categories_catid_seq', 2, true);


--
-- Name: client_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: aaxshfcnahrbwi
--

SELECT pg_catalog.setval('public.client_userid_seq', 1, false);


--
-- Name: inventory_invid_seq; Type: SEQUENCE SET; Schema: public; Owner: aaxshfcnahrbwi
--

SELECT pg_catalog.setval('public.inventory_invid_seq', 7, true);


--
-- Name: photoshoots_psid_seq; Type: SEQUENCE SET; Schema: public; Owner: aaxshfcnahrbwi
--

SELECT pg_catalog.setval('public.photoshoots_psid_seq', 2, true);


--
-- Name: schedule_apptid_seq; Type: SEQUENCE SET; Schema: public; Owner: aaxshfcnahrbwi
--

SELECT pg_catalog.setval('public.schedule_apptid_seq', 1, false);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (catid);


--
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (userid);


--
-- Name: inventory inventory_pkey; Type: CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.inventory
    ADD CONSTRAINT inventory_pkey PRIMARY KEY (invid);


--
-- Name: photoshoots photoshoots_pkey; Type: CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.photoshoots
    ADD CONSTRAINT photoshoots_pkey PRIMARY KEY (psid);


--
-- Name: schedule schedule_pkey; Type: CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_pkey PRIMARY KEY (apptid);


--
-- Name: client client_apptid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_apptid_fkey FOREIGN KEY (apptid) REFERENCES public.schedule(apptid);


--
-- Name: inventory inventory_catnum_fkey; Type: FK CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.inventory
    ADD CONSTRAINT inventory_catnum_fkey FOREIGN KEY (catnum) REFERENCES public.categories(catid);


--
-- Name: schedule schedule_psselected_fkey; Type: FK CONSTRAINT; Schema: public; Owner: aaxshfcnahrbwi
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_psselected_fkey FOREIGN KEY (psselected) REFERENCES public.photoshoots(psid);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: aaxshfcnahrbwi
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO aaxshfcnahrbwi;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO aaxshfcnahrbwi;


--
-- PostgreSQL database dump complete
--

