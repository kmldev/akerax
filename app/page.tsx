import ContactForm from "@/components/ContactForm";
import ExperienceTimeline from "@/components/ExperienceTimeline";
import HeroScene from "@/components/HeroScene";
import Navigation from "@/components/Navigation";
import ProjectsCarousel from "@/components/ProjectsCarousel";
import ScrollProgress from "@/components/ScrollProgress";

export default function Home() {
  return (
    <>
      <ScrollProgress />
      <Navigation />
      <main className="flex flex-col items-center justify-center">
        <HeroScene />
        <ExperienceTimeline />
        <ProjectsCarousel />
        <ContactForm />
      </main>
    </>
  );
}
