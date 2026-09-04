"use client";

import { projects } from "@/lib/content";
import ProjectScreen from "@/scenes/projects/ProjectScreen";
import { useMemo } from "react";

type CarouselRigProps = {
  active: number;
};

export default function CarouselRig({ active }: CarouselRigProps) {
  const positions = useMemo(
    () =>
      projects.map((_, index) => {
        const offset = index - active;
        return [offset * 2.55, 0, Math.abs(offset) * -0.85] as [
          number,
          number,
          number,
        ];
      }),
    [active],
  );

  return (
    <group>
      {projects.map((project, index) => (
        <ProjectScreen
          key={project.name}
          project={project}
          position={positions[index]}
          active={index === active}
        />
      ))}
    </group>
  );
}
